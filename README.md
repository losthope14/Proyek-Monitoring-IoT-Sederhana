# Proyek Monitoring IoT Sederhana

Selamat datang di repositori untuk proyek monitoring IoT sederhana ini. Proyek ini bertujuan untuk memantau dan menampilkan data suhu dan temperatur dari perangkat IoT menggunakan berbagai teknologi modern.

## Deskripsi Proyek

Proyek ini menggunakan berbagai teknologi dan alat untuk memantau data suhu dan temperatur dari perangkat IoT. Berikut adalah ringkasan dari elemen-elemen utama proyek:

- **Bahasa Pemrograman**: PHP dan JavaScript.
- **Desain UI**: Bootstrap.
- **Pengelolaan Paket**: Node.js.
- **Protokol Komunikasi**: MQTT dengan paket Paho.
- **Broker MQTT**: `test.mosquitto.org` (broker MQTT gratis).
- **Simulator IoT**: Wokwi, terdiri dari mikrokontroler ESP32 dan sensor suhu dan temperatur DHT22.

Saat simulator dijalankan, sistem yang terhubung akan menerima data suhu dan temperatur dari simulator dan menampilkannya di antarmuka pengguna.

## Teknologi dan Alat yang Digunakan

- **PHP**
- **JavaScript**: Untuk mengatur penerimaan input data menggunakan protokol MQTT, frontend dan interaksi dinamis.
- **Bootstrap**: Untuk membuat antarmuka pengguna yang responsif dan modern.
- **Node.js**: Untuk mengelola dependensi dan paket.
- **Paho MQTT**: Untuk komunikasi MQTT antara server dan perangkat IoT.
- **test.mosquitto.org**: Broker MQTT gratis untuk komunikasi data.
- **Wokwi IoT Simulator**: Simulator IoT dengan mikrokontroler ESP32 dan sensor DHT22. [Link ke Wokwi IoT Simulator](https://wokwi.com/projects/348000647024476755).

## Cara Kerja Sistem

1. **Simulasi IoT**: Mikrokontroler ESP32 dengan sensor DHT22 di Wokwi mengirimkan data suhu dan temperatur.
2. **Pengiriman Data**: Data dikirim melalui protokol MQTT ke broker `test.mosquitto.org`.
3. **Penerimaan Data**: Sistem monitoring menerima data dari broker MQTT.
4. **Penampilan Data**: Data suhu dan temperatur ditampilkan di antarmuka pengguna yang dirancang dengan Bootstrap.

## Instalasi dan Pengaturan

1. **Instalasi Package Node.js**
   
     ```bash
     npm install
     ```
2. **Konfigurasi MQTT**
   - Pastikan Anda memiliki akses ke broker MQTT test.mosquitto.org.
   - Sesuaikan pengaturan MQTT di file konfigurasi (misalnya config.js atau mqtt-config.js) sesuai dengan kebutuhan proyek.
3. **Menjalankan Server PHP**
   - Jalankan XAMPP sebagai server PHP
4. **Mengakses Interface Sistem**

   ```bash
   http://localhost/Proyek-Monitoring-IoT-Sederhana
   ```
5. **Memulai Simulator**
   - Jalankan simulator di Wokwi: [Simulator](https://wokwi.com/projects/348000647024476755)
   - Ubah nilai suhu dan temperature di simulator dan amati perubahan data di interface sistem monitor
