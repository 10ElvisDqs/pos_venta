<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Illuminate\Support\Str;
use Carbon\Carbon;
class PrinterController extends Controller
{
    //TM-20II
    public function test(Request $request){



        $connector = new WindowsPrintConnector($request->impresora);
        $printer = new Printer($connector);
        $printer -> text($request->impresora." Impresora conectada!\n");
        $printer -> cut();
        $printer -> close();
        return "Ready";
    }
    public function venta(Request $request)
    {
        $year = Carbon::now()->format('Y');
        $connector = new WindowsPrintConnector($request->impresora);
        $printer = new Printer($connector);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setFont(Printer::FONT_A);
        $printer->setDoubleStrike(true);
        $printer->text("{$request->nombre} \n");
        $printer->setDoubleStrike(false);
        $printer->setFont(Printer::FONT_C);
        $printer->text("{$request->documento} \n");
        $printer->text("{$request->direccion} \n");
        $printer->text("{$request->telefono} \n");
        $printer->feed(1);
        $printer->setDoubleStrike(true);
        $printer->text("TICKET DE VENTA\n");
        $printer->text("{$request->venta['id']} \n");
        $printer->setDoubleStrike(false);
        $printer->feed(1);
        $printer->setEmphasis(true);
        $printer->text($this->lines(47));
        $printer->setEmphasis(false);
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->setDoubleStrike(true);

        $printer->text("Cliente: ");
        $printer->setDoubleStrike(false);
        $printer->text("{$request->venta['cliente']} \n");

        $printer->text($this->lines(47));
        $printer->setEmphasis(false);
        $printer->setDoubleStrike(true);
        $printer->text("Fecha: ");
        $printer->setDoubleStrike(false);
        $printer->text("{$request->venta['fecha']} \n");

        $printer->feed(1);
        $printer->setEmphasis(true);
        $printer->text($this->addSpaces('Cant.', 8) . $this->addSpaces('Descripcion', 18) . $this->addSpaces('P.Unit', 10) . $this->addSpaces('Total', 10) . "\n");
        $printer->text($this->lines(47));
        $printer->setEmphasis(false);
        foreach ($request->venta['venta_inventarios'] as $item) {
            $cant = number_format(floatval($item['inventario']['cantidad']), 2);
            $cant = str_split($cant, 8);
            foreach ($cant as $k => $l) {
                $l = trim($l);
                $cant[$k] = $this->addSpaces($l, 8);
            }

            $descripcion = str_split($item['inventario']['articulo']['nombre']." X ".$item['inventario']['articulo']['medida']['codigo'], 18);
            foreach ($descripcion as $k => $l) {
                $l = trim($l);
                $descripcion[$k] = $this->addSpaces($l, 18);
            }

            $price = number_format(floatval($item['precio']), 2);
            $price = str_split($price, 10);
            foreach ($price as $k => $l) {
                $l = trim($l);
                $price[$k] = $this->addSpaces($l, 10);
            }
            $total = str_split(number_format(floatval($item['inventario']['cantidad'] * $item['inventario']['venta']), 2), 10);
            foreach ($total as $k => $l) {
                $l = trim($l);
                $total[$k] = $this->addSpaces($l, 10);
            }
            $counter = 0;
            $temp = [];
            $temp[] = count($cant);
            $temp[] = count($descripcion);
            $temp[] = count($price);
            $temp[] = count($total);
            $counter = max($temp);
            for ($i = 0; $i < $counter; $i++) {
                $line = '';
                if (isset($cant[$i])) {
                    $line .= (" " . $cant[$i]);
                }
                if (isset($descripcion[$i])) {
                    $line .= ($descripcion[$i]);
                }
                if (isset($price[$i])) {
                    $line .= ($price[$i]);
                }
                if (isset($total[$i])) {
                    $line .= ($total[$i]);
                }
                $printer->text($line . "\n");

            }
        }

        $printer->text($this->lines(47));
        $printer->feed(1);
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->setFont(Printer::FONT_A);
        $printer->setDoubleStrike(true);
        $total = number_format(floatval($request->venta['total']), 2);
        $printer->text("Total:  {$total}\n");
        $printer->feed(1);
        $efectivo = number_format(floatval($request->venta['pago']), 2);
        $printer->text("Efectivo:  {$efectivo}\n");
        $cambio = number_format(floatval($request->venta['cambio']), 2);
        $printer->text("Cambio:  {$cambio}\n");
        $printer->feed(1);

        $printer->setDoubleStrike(false);
        $printer->feed(1);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setFont(Printer::FONT_C);
        $printer->text("Gracias por su preferencia \n");
        $printer->feed(1);

        $printer->pulse();
        $printer->cut();
        $printer->close();
        return $request->name;
    }



    public function lines(int $lgn)
    {
        $asteriscos = Str::padRight("-", $lgn, " -");
        return "{$asteriscos}\n";
    }
    function addSpaces($string = '', $valid_string_length = 0)
    {
        if (strlen($string) < $valid_string_length) {
            $spaces = $valid_string_length - strlen($string);
            for ($index1 = 1; $index1 <= $spaces; $index1++) {
                $string = $string . ' ';
            }
        }

        return $string;
    }
}
