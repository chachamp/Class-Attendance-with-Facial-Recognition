/*
  MySQL Connector/Arduino Example : basic select

  This example demonstrates how to issue a SELECT query with no parameters
  and use the data returned. For this, we use the Cursor class to execute
  the query and get the results.

  It demonstrates who methods for running queries. The first allows you to
  allocate memory for the cursor and later reclaim it, the second shows how
  to use a single instance of the cursor use throughout a sketch.

  NOTICE: You must download and install the World sample database to run
          this sketch unaltered. See http://dev.mysql.com/doc/index-other.html.

  CAUTION: Don't mix and match the examples. Use one or the other in your
           own sketch -- you'll get compilation errors at the least.

  INSTRUCTIONS FOR USE

  1) Change the address of the server to the IP address of the MySQL server
  2) Change the user and password to a valid MySQL user and password
  3) Connect a USB cable to your Arduino
  4) Select the correct board and port
  5) Compile and upload the sketch to your Arduino
  6) Once uploaded, open Serial Monitor (use 115200 speed) and observe

  Note: The MAC address can be anything so long as it is unique on your network.

  Created by: Dr. Charles A. Bell
*/
#include <ESP8266WiFi.h>           // Use this for WiFi instead of Ethernet.h
#include <MySQL_Connection.h>
#include <MySQL_Cursor.h>
int LED=D6;
String valuedb;
IPAddress server_addr(35,194,252,40);  // IP of the MySQL *server* here
char user[] = "hahahaha";              // MySQL user login username
char password[] = "12345678";        // MySQL user login password

// Sample query
char query[] = "SELECT status_sw FROM db_main.logcontroller WHERE group_stu = 2 Order by id DESC limit 1";

// WiFi card example
char ssid[] = "kokkak555";         // your SSID
char pass[] = "kokkak555";     // your SSID Password

WiFiClient client;                 // Use this for WiFi instead of EthernetClient
MySQL_Connection conn(&client);
MySQL_Cursor* cursor;

void setup() {
  Serial.begin(115200);
  pinMode(LED, OUTPUT);
  while (!Serial); // wait for serial port to connect. Needed for Leonardo only

  // Begin WiFi section
  Serial.printf("\nConnecting to %s", ssid);
  WiFi.begin(ssid, pass);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  // print out info about the connection:
  Serial.println("\nConnected to network");
  Serial.print("My IP address is: ");
  Serial.println(WiFi.localIP());

  Serial.print("Connecting to SQL...  ");
  if (conn.connect(server_addr, 3306, user, password))
    Serial.println("OK.");
  else
    Serial.println("FAILED.");
  
  // create MySQL cursor object
  cursor = new MySQL_Cursor(&conn);
}


void loop() {
  delay(500);
  MySQL_Cursor *cur_mem = new MySQL_Cursor(&conn);
  // Execute the query
  cur_mem->execute(query);
  // Fetch the columns and print them
  column_names *cols = cur_mem->get_columns();
  for (int f = 0; f < cols->num_fields; f++) {
    cols->fields[f]->name;
    if (f < cols->num_fields-1) {
      Serial.print(", ");
    }
  }

  // Read the rows and print them
  row_values *row = NULL;
  do {
    row = cur_mem->get_next_row();
    if (row != NULL) {
      int count = 0;
      for (int f = 0; f < cols->num_fields; f++) 
      {
        valuedb = row->values[f];
         Serial.println(valuedb);
         count ++;
         if(valuedb == "Off")
         {
           digitalWrite(D6, LOW);
          
          }
         else if (valuedb == "On")
         {
         digitalWrite(D6, HIGH);
         
         }
       
      }
     
    }
  } while (row != NULL);
  // Deleting the cursor also frees up memory used
  delete cur_mem;
}

