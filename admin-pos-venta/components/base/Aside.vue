<template lang="">
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main"
  >
    <div class="sidenav-header">
      <i
        class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true"
        id="iconSidenav"
      ></i>
      <a class="navbar-brand m-0" href="/">
        <div id="logo">
          <img
            src="../../static/assets/img/logos/sthil.png"
            class="h-10 w-10"
            alt="waves"
          />
          <span class="ms-2 font-weight-bold">Punto de Venta</span>
        </div>
      </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div
      class="collapse navbar-collapse w-auto h-auto"
      id="sidenav-collapse-main"
    >
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6
            class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"
          >
            ADMINISTRACION
          </h6>
        </li>
        <li class="nav-item">
          <a
            data-bs-toggle="collapse"
            href="#configuracion"
            class="nav-link"
            aria-controls="configuracion"
            role="button"
            aria-expanded="false"
          >
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2"
            >
              <svg
                width="12px"
                height="12px"
                viewBox="0 0 42 42"
                version="1.1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
              >
                <title>office</title>
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <g
                    transform="translate(-1869.000000, -293.000000)"
                    fill="#FFFFFF"
                    fill-rule="nonzero"
                  >
                    <g transform="translate(1716.000000, 291.000000)">
                      <g
                        id="office"
                        transform="translate(153.000000, 2.000000)"
                      >
                        <path
                          class="color-background"
                          d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"
                          opacity="0.6"
                        ></path>
                        <path
                          class="color-background"
                          d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"
                        ></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Configuración</span>
          </a>
          <div class="collapse" id="configuracion">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/configuracion/sucursal">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal"> Sucursal </span>
                </nuxtLink>
              </li>
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/configuracion/marcas">
                  <span class="sidenav-mini-icon"> M </span>
                  <span class="sidenav-normal"> Marcas </span>
                </nuxtLink>
              </li>
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/configuracion/medidas">
                  <span class="sidenav-mini-icon"> M </span>
                  <span class="sidenav-normal"> Medidas </span>
                </nuxtLink>
              </li>
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/configuracion/categorias">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal"> Categorias </span>
                </nuxtLink>
              </li>
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/configuracion/articulos">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal"> Articulos </span>
                </nuxtLink>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a
            data-bs-toggle="collapse"
            href="#usuarios"
            class="nav-link"
            aria-controls="usuarios"
            role="button"
            aria-expanded="false"
          >
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2"
            >
              <svg
                width="12px"
                height="12px"
                viewBox="0 0 42 42"
                version="1.1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
              >
                <title>office</title>
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <g
                    transform="translate(-1869.000000, -293.000000)"
                    fill="#FFFFFF"
                    fill-rule="nonzero"
                  >
                    <g transform="translate(1716.000000, 291.000000)">
                      <g
                        id="office"
                        transform="translate(153.000000, 2.000000)"
                      >
                        <path
                          class="color-background"
                          d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"
                          opacity="0.6"
                        ></path>
                        <path
                          class="color-background"
                          d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"
                        ></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Usuarios</span>
          </a>
          <div class="collapse" id="usuarios">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/usuarios/usuario">
                  <span class="sidenav-mini-icon"> U </span>
                  <span class="sidenav-normal"> Usuarios </span>
                </nuxtLink>
              </li>
            </ul>
          </div>
          <div class="collapse" id="usuarios">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/usuarios/clientes">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal"> Clientes </span>
                </nuxtLink>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item mt-3">
          <h6
            class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"
          >
            INVENTARIO
          </h6>
        </li>
        <li class="nav-item">
          <a
            data-bs-toggle="collapse"
            href="#inventario"
            class="nav-link"
            aria-controls="inventario"
            role="button"
            aria-expanded="false"
          >
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2"
            >
              <svg
                width="12px"
                height="12px"
                viewBox="0 0 42 42"
                version="1.1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
              >
                <title>office</title>
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <g
                    transform="translate(-1869.000000, -293.000000)"
                    fill="#FFFFFF"
                    fill-rule="nonzero"
                  >
                    <g transform="translate(1716.000000, 291.000000)">
                      <g
                        id="office"
                        transform="translate(153.000000, 2.000000)"
                      >
                        <path
                          class="color-background"
                          d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"
                          opacity="0.6"
                        ></path>
                        <path
                          class="color-background"
                          d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"
                        ></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Inventario</span>
          </a>
          <div class="collapse" id="inventario">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/inventario">
                  <span class="sidenav-mini-icon"> G </span>
                  <span class="sidenav-normal"> General </span>
                </nuxtLink>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item mt-3">
          <h6
            class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"
          >
            CAJA
          </h6>
        </li>
        <li class="nav-item">
          <a
            data-bs-toggle="collapse"
            href="#caja"
            class="nav-link"
            aria-controls="caja"
            role="button"
            aria-expanded="false"
          >
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2"
            >
              <svg
                width="12px"
                height="12px"
                viewBox="0 0 42 42"
                version="1.1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
              >
                <title>office</title>
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <g
                    transform="translate(-1869.000000, -293.000000)"
                    fill="#FFFFFF"
                    fill-rule="nonzero"
                  >
                    <g transform="translate(1716.000000, 291.000000)">
                      <g
                        id="office"
                        transform="translate(153.000000, 2.000000)"
                      >
                        <path
                          class="color-background"
                          d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"
                          opacity="0.6"
                        ></path>
                        <path
                          class="color-background"
                          d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"
                        ></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Caja</span>
          </a>
          <div class="collapse" id="caja">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/cajas">
                  <span class="sidenav-mini-icon"> M </span>
                  <span class="sidenav-normal"> Mi Caja </span>
                </nuxtLink>
              </li>
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/cajas/historial">
                  <span class="sidenav-mini-icon"> H </span>
                  <span class="sidenav-normal"> Historial</span>
                </nuxtLink>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <h6
            class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"
          >
            COMPRAS
          </h6>
        </li>
        <li class="nav-item">
          <a
            data-bs-toggle="collapse"
            href="#compra"
            class="nav-link"
            aria-controls="compra"
            role="button"
            aria-expanded="false"
          >
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2"
            >
              <svg
                width="12px"
                height="12px"
                viewBox="0 0 42 42"
                version="1.1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
              >
                <title>office</title>
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <g
                    transform="translate(-1869.000000, -293.000000)"
                    fill="#FFFFFF"
                    fill-rule="nonzero"
                  >
                    <g transform="translate(1716.000000, 291.000000)">
                      <g
                        id="office"
                        transform="translate(153.000000, 2.000000)"
                      >
                        <path
                          class="color-background"
                          d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"
                          opacity="0.6"
                        ></path>
                        <path
                          class="color-background"
                          d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"
                        ></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Compras</span>
          </a>
          <div class="collapse" id="compra">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/compras">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal"> Nueva Compra </span>
                </nuxtLink>
              </li>
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/compras/lista">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal"> Compras </span>
                </nuxtLink>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item mt-3">
          <h6
            class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"
          >
            VENTAS
          </h6>
        </li>
        <li class="nav-item">
          <a
            data-bs-toggle="collapse"
            href="#venta"
            class="nav-link"
            aria-controls="venta"
            role="button"
            aria-expanded="false"
          >
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2"
            >
              <svg
                width="12px"
                height="12px"
                viewBox="0 0 42 42"
                version="1.1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
              >
                <title>office</title>
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <g
                    transform="translate(-1869.000000, -293.000000)"
                    fill="#FFFFFF"
                    fill-rule="nonzero"
                  >
                    <g transform="translate(1716.000000, 291.000000)">
                      <g
                        id="office"
                        transform="translate(153.000000, 2.000000)"
                      >
                        <path
                          class="color-background"
                          d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"
                          opacity="0.6"
                        ></path>
                        <path
                          class="color-background"
                          d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"
                        ></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Ventas</span>
          </a>
          <div class="collapse" id="venta">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/ventas">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal"> Nueva venta </span>
                </nuxtLink>
              </li>
              <li class="nav-item">
                <nuxtLink class="nav-link" to="/ventas/lista">
                  <span class="sidenav-mini-icon"> V </span>
                  <span class="sidenav-normal"> Ventas </span>
                </nuxtLink>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </aside>
</template>
