FROM node:20.10.0

# Crear directorio de la aplicación
WORKDIR /usr/src/app

# Copiar package.json y package-lock.json
COPY package*.json ./

# Instalar dependencias
RUN npm install

# Copiar el resto del proyecto
COPY . .

# Exponer el puerto 3000
EXPOSE 3000

# Comando por defecto
CMD ["npm", "run", "dev"]
