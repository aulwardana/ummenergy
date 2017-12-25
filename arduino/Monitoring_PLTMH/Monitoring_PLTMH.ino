#include <SPI.h>
#include <string.h>
#include <Ethernet.h>
#include "EmonLib.h"  
#include "DHT.h"

#define DHTPIN 2
#define DHTTYPE DHT11 
DHT dht(DHTPIN, DHTTYPE);

int count;

//deklarasi variabel Power Meter
EnergyMonitor emon1;
float WattPhaseRPLTMH=0, VoltagePhaseRPLTMH=0, AmperePhaseRPLTMH=0, CosphiPhaseRPLTMH=0, WAPhaseRPLTMH=0;
int tempsuhu=0;
int WattPLTS=6, VoltagePLTS=5, AmperePLTS=5, PowerFactorPLTS=5, FrekuensiPLTS=5;

//deklarasi variabel Ethernet Shield 
byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED};
char server[] = "www.ummenergy.com"; //Domain Website
char buffer[256];
IPAddress ip(192, 168, 1, 7);
EthernetClient client;
 
void setup(){
  Serial.begin(9600);
  
  Serial.println("DHTxx test!");
  dht.begin();
  
 //Konfigurasi untuk emon library
  emon1.voltage(5, 3800.46, 1.7);  // Voltage: input pin, calibration, phase_shift
  emon1.current(1, 31.1);       // Current: input pin, calibration.
  
  //Memulai Konfigurasi DHCP
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
    //while(true);
    Ethernet.begin(mac, ip);
  }
  delay(100);
  Serial.println(Ethernet.localIP());
  Serial.println("connecting...");
  delay(500);
}
 
void loop(){
  BacaDataPM();
  delay(200);
  SendDataWebPLTMHPhaseR();
  suhu();
  SendSuhu();
  delay(500);  // Delay Pengiriman Data ke Web Server
}

void BacaDataPM(){
  emon1.calcVI(20,2000);                // Calculate all. No.of wavelengths, time-out
  double Irms = emon1.Irms;   // Calculate Irms only
  float  Vrms   = emon1.Vrms;             //extract Vrms into Variable
  float VA = Vrms * Irms;
  float Watt = Vrms * Irms * 0.9; //nilai 0.9 didapat dari Cosinus 0.8 karena Power Faktor dari PLTMH adalah 0.8
  float PF = Watt/VA;
  
  WattPhaseRPLTMH=Watt;
  VoltagePhaseRPLTMH=Vrms;
  AmperePhaseRPLTMH=Irms;
  CosphiPhaseRPLTMH=PF;
  WAPhaseRPLTMH=VA;
  
  Serial.print("Ampere : ");	
  Serial.print(Irms);		       // Irms
  Serial.print("   ");
  Serial.print("Voltage : ");	
  Serial.print(Vrms);		       // Vrms
  Serial.print("   ");
  Serial.print("Apparent Power : ");	
  Serial.print(VA);		       // Apparent Power
  Serial.print("   ");
  Serial.print("Real Power : ");	
  Serial.print(Watt);		       // Real Power
  Serial.print("   ");
  Serial.print("Power Factor : ");
  Serial.print(PF);		       // Power Factor
  Serial.println("   ");
}

void SendDataWebPLTMHPhaseR(){
  if (client.connect(server, 80)) {
     Serial.println("connected");
     client.print("GET /add/_sensing-get-pltmh-r.php?");
     client.print("watt=");
     client.print(WattPhaseRPLTMH);
     client.print("&&");
     client.print("voltampere=");
     client.print(WAPhaseRPLTMH);
     client.print("&&");
     client.print("cosphi=");
     client.print(CosphiPhaseRPLTMH);
     client.print("&&");
     client.print("volt=");
     client.print(VoltagePhaseRPLTMH);
     client.print("&&");
     client.print("ampere=");
     client.print(AmperePhaseRPLTMH);
     client.println(" HTTP/1.1");
     client.println("Host: www.ummenergy.com");
     client.println( "Content-Type: application/x-www-form-urlencoded" );
     client.println("Connection: close");
     client.println();
     count++;
     client.stop();
   }else {
     Serial.println("Koneksi Gagal");
   }
}

void suhu(){
  int h = dht.readHumidity();
  int t = dht.readTemperature();
  tempsuhu = t;
  if (isnan(t) || isnan(h)) {
    Serial.println("Failed to read from DHT");
  } else {
    Serial.print("Jumlah Data: "); 
    Serial.print(count);
    Serial.print(" \t");
    Serial.print("Temperature: "); 
    Serial.print(t);
    Serial.println(" C");
    delay(1000);
  }
}
  
 void SendSuhu(){
  if (client.connect(server, 80)) {
     Serial.println("connected");
     client.print("GET /sensing/_sensing-get-temp.php?");
     client.print("temp=");
     client.print(tempsuhu);
     client.println(" HTTP/1.1");
     client.println("Host: www.ummenergy.com");
     client.println( "Content-Type: application/x-www-form-urlencoded" );
     client.println("Connection: close");
     client.println();
     client.stop();
   }else {
     Serial.println("Koneksi Gagal");
   }
}

