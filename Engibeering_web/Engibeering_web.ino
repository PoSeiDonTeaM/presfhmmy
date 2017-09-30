#include <SPI.h>
#include <Ethernet.h>
#include <Servo.h> 
int led = 4;
Servo microservo; 
int pos = 0; 
byte mac[] = { 0xB8, 0x27, 0xEB, 0x2E, 0x35, 0x17 };   //physical mac address
byte ip[] = { 192, 168, 2, 6 };                      // 
byte gateway[] = { 192, 168, 1, 1 };                   // internet access via router
byte subnet[] = { 255, 255, 255, 0 };                  //subnet mask
EthernetServer server(80);                             //server port     
String readString;

void setup() {
 // Open serial communications and wait for port to open:
  Serial.begin(9600);
   while (!Serial) {
    ; // wait for serial port to connect. Needed for Leonardo only
  }
  pinMode(led, OUTPUT);
  microservo.attach(7);
  // start the Ethernet connection and the server:
  Ethernet.begin(mac, ip, gateway, subnet);
  server.begin();
  Serial.print("server is at ");
  Serial.println(Ethernet.localIP());
}


void loop() {
  // Create a client connection
  EthernetClient client = server.available();
  if (client) {
    while (client.connected()) {   
      if (client.available()) {
        char c = client.read();
     
        //read char by char HTTP request
        if (readString.length() < 100) {
          //store characters to string
          readString += c;
          //Serial.print(c);
         }

         //if HTTP request has ended
         if (c == '\n') {          
           Serial.println(readString); //print to serial monitor for debuging
     
           client.println("HTTP/1.1 200 OK"); //send new page
           client.println("Content-Type: text/html");
           client.println();     
           client.println("<HTML>");
           client.println("<HEAD>");
           client.println("<meta name='apple-mobile-web-app-capable' content='yes' />");
           client.println("<meta name='apple-mobile-web-app-status-bar-style' content='black-translucent' />");
           client.println("<link rel='stylesheet' type='text/css' href='http://randomnerdtutorials.com/ethernetcss.css' />");
           client.println("<TITLE>Engibeering Science</TITLE>");
           client.println("<style>");
           client.println(" #yolo{ text-align: center; color: red;}");
           client.println("body{ background-color:#666;}");
           client.println(".button{ background-color: #222; border-color: white; color: white; padding: 20px; text-align: center; display: inline-block; font-size: 16px; margin-left: 50px; margin-top: 50px;}");
           client.println("#title{ font-size: 50px; text-align: center; color: #aaa;}");
           client.println("</style>");
           client.println("</HEAD>");
           client.println("<BODY>");
           client.println("<p id='title'>Engibeering  Science <hr></p>");
           client.println("<a href=\'/>button1on\'\'><button class='button button1'>LED On</button></a>"); 
           client.println("<a href=\"/>button1off\"\"><button class='button button2'>LED Off</button></a>"); 
           client.println("</BODY>");
           client.println("</HTML>");
     
           delay(1);
           //stopping client
           client.stop();
           //controls the Arduino if you press the buttons
           if (readString.indexOf("?button1on") >0){
               digitalWrite(led, HIGH);
               Serial.print("Led on");
           }
           if (readString.indexOf("?button1off") >0){
               digitalWrite(led, LOW);
           }
           if (readString.indexOf("?button2on") >0){
                for(pos = 0; pos < 180; pos += 3)  // goes from 0 degrees to 180 degrees 
                {                                  // in steps of 1 degree 
                  microservo.write(pos);              // tell servo to go to position in variable 'pos' 
                  delay(15);                       // waits 15ms for the servo to reach the position 
                } 
           }
           if (readString.indexOf("?button2off") >0){
                for(pos = 180; pos>=1; pos-=3)     // goes from 180 degrees to 0 degrees 
                {                                
                  microservo.write(pos);              // tell servo to go to position in variable 'pos' 
                  delay(15);                   
                } 
           }
            //clearing string for next read
            readString="";  
           
         }
       }
    }
}
}

