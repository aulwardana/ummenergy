#include <Adafruit_Sensor.h>
#include <SPI.h>
#include <string.h>
#include <Ethernet.h>
#include <EmonLib.h> 
#include <DHT.h>
#include <DHT_U.h>

#define DHTPIN 2
#define DHTTYPE DHT11 
DHT dht(DHTPIN, DHTTYPE);

int count;

//deklarasi variabel Power Meter
EnergyMonitor emonR, emonS, emonT;
float WattPhaseRPLTMH=0, VoltagePhaseRPLTMH=0, AmperePhaseRPLTMH=0, CosphiPhaseRPLTMH=0, WAPhaseRPLTMH=0;
float WattPhaseSPLTMH=0, VoltagePhaseSPLTMH=0, AmperePhaseSPLTMH=0, CosphiPhaseSPLTMH=0, WAPhaseSPLTMH=0;
float WattPhaseTPLTMH=0, VoltagePhaseTPLTMH=0, AmperePhaseTPLTMH=0, CosphiPhaseTPLTMH=0, WAPhaseTPLTMH=0;
int tempsuhu=0;

//deklarasi variabel Ethernet Shield 
byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED};
char server[] = "www.ummenergy.com"; //Domain Website
char buffer[256];
EthernetClient client;
 
void setup(){
  Serial.begin(115200);
  
  Serial.println("DHTxx test!");
  dht.begin();
  
  //Konfigurasi untuk emon phase R
  emonR.voltage(5, 3800.46, 1.7);  // Voltage: input pin, calibration, phase_shift
  emonR.current(1, 31.1);       // Current: input pin, calibration.

  //Konfigurasi untuk emon phase S
  emonS.voltage(5, 3800.46, 1.7);  // Voltage: input pin, calibration, phase_shift
  emonS.current(1, 31.1);       // Current: input pin, calibration.

  //Konfigurasi untuk emon phase T
  emonT.voltage(5, 3800.46, 1.7);  // Voltage: input pin, calibration, phase_shift
  emonT.current(1, 31.1);       // Current: input pin, calibration.
  
  //Memulai Konfigurasi DHCP
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
    //while(true);
    Ethernet.begin(mac);
  }
  delay(100);
  Serial.println(Ethernet.localIP());
  Serial.println("connecting...");
  delay(500);
}
 
void loop(){
  BacaDataPMPhaseR();
  SendDataWebPLTMHPhaseR();
  BacaDataPMPhaseS();
  SendDataWebPLTMHPhaseS();
  BacaDataPMPhaseT();
  SendDataWebPLTMHPhaseT();
  suhu();
  SendSuhu();
  delay(50);  // Delay Pengiriman Data ke Web Server
}

void BacaDataPMPhaseR(){
  emonR.calcVI(20,2000);                // Calculate all. No.of wavelengths, time-out
  double Irms = emonR.Irms;   // Calculate Irms only
  float  Vrms   = emonR.Vrms;             //extract Vrms into Variable
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
     client.print("GET /sensing/_sensing-get-pltmh-r.php?");
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

void BacaDataPMPhaseS(){
  emonS.calcVI(20,2000);                // Calculate all. No.of wavelengths, time-out
  double Irms = emonS.Irms;   // Calculate Irms only
  float  Vrms   = emonS.Vrms;             //extract Vrms into Variable
  float VA = Vrms * Irms;
  float Watt = Vrms * Irms * 0.9; //nilai 0.9 didapat dari Cosinus 0.8 karena Power Faktor dari PLTMH adalah 0.8
  float PF = Watt/VA;
  
  WattPhaseSPLTMH=Watt;
  VoltagePhaseSPLTMH=Vrms;
  AmperePhaseSPLTMH=Irms;
  CosphiPhaseSPLTMH=PF;
  WAPhaseSPLTMH=VA;
  
  Serial.print("Ampere : ");  
  Serial.print(Irms);          // Irms
  Serial.print("   ");
  Serial.print("Voltage : "); 
  Serial.print(Vrms);          // Vrms
  Serial.print("   ");
  Serial.print("Apparent Power : ");  
  Serial.print(VA);          // Apparent Power
  Serial.print("   ");
  Serial.print("Real Power : ");  
  Serial.print(Watt);          // Real Power
  Serial.print("   ");
  Serial.print("Power Factor : ");
  Serial.print(PF);          // Power Factor
  Serial.println("   ");
}

void SendDataWebPLTMHPhaseS(){
  if (client.connect(server, 80)) {
     Serial.println("connected");
     client.print("GET /sensing/_sensing-get-pltmh-s.php?");
     client.print("watt=");
     client.print(WattPhaseSPLTMH);
     client.print("&&");
     client.print("voltampere=");
     client.print(WAPhaseSPLTMH);
     client.print("&&");
     client.print("cosphi=");
     client.print(CosphiPhaseSPLTMH);
     client.print("&&");
     client.print("volt=");
     client.print(VoltagePhaseSPLTMH);
     client.print("&&");
     client.print("ampere=");
     client.print(AmperePhaseSPLTMH);
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

void BacaDataPMPhaseT(){
  emonT.calcVI(20,2000);                // Calculate all. No.of wavelengths, time-out
  double Irms = emonT.Irms;   // Calculate Irms only
  float  Vrms   = emonT.Vrms;             //extract Vrms into Variable
  float VA = Vrms * Irms;
  float Watt = Vrms * Irms * 0.9; //nilai 0.9 didapat dari Cosinus 0.8 karena Power Faktor dari PLTMH adalah 0.8
  float PF = Watt/VA;
  
  WattPhaseTPLTMH=Watt;
  VoltagePhaseTPLTMH=Vrms;
  AmperePhaseTPLTMH=Irms;
  CosphiPhaseTPLTMH=PF;
  WAPhaseTPLTMH=VA;
  
  Serial.print("Ampere : ");  
  Serial.print(Irms);          // Irms
  Serial.print("   ");
  Serial.print("Voltage : "); 
  Serial.print(Vrms);          // Vrms
  Serial.print("   ");
  Serial.print("Apparent Power : ");  
  Serial.print(VA);          // Apparent Power
  Serial.print("   ");
  Serial.print("Real Power : ");  
  Serial.print(Watt);          // Real Power
  Serial.print("   ");
  Serial.print("Power Factor : ");
  Serial.print(PF);          // Power Factor
  Serial.println("   ");
}

void SendDataWebPLTMHPhaseT(){
  if (client.connect(server, 80)) {
     Serial.println("connected");
     client.print("GET /sensing/_sensing-get-pltmh-t.php?");
     client.print("watt=");
     client.print(WattPhaseTPLTMH);
     client.print("&&");
     client.print("voltampere=");
     client.print(WAPhaseTPLTMH);
     client.print("&&");
     client.print("cosphi=");
     client.print(CosphiPhaseTPLTMH);
     client.print("&&");
     client.print("volt=");
     client.print(VoltagePhaseTPLTMH);
     client.print("&&");
     client.print("ampere=");
     client.print(AmperePhaseTPLTMH);
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

