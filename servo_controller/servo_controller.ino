
#include <Servo.h>

int dir = 0;
int pos_h = 100;  // horizontal position
int pos_v = 90;  // vertical position
Servo servoHorizontal;          // Define horizontal servo
Servo servoVertical;         // Define vertical servo
void setup() {
  servoHorizontal.attach(10);  // Set horizontal servo to digital pin 10
  servoVertical.attach(9);  // Set vertical servo to digital pin 9
  
  Serial.begin(9600);
} 

void loop() {            // Loop through motion tests

  if (Serial.available() > 0) {
    dir = Serial.read();

    switch (dir) {
      case 'U':
        pos_v -= 30;
        pos_v = (pos_v < 0) ? 0 : pos_v;
        break;
      case 'u':
        pos_v -= 15;
        pos_v = (pos_v < 0) ? 0 : pos_v;
        break;
      case 'D':
        pos_v += 20;
        pos_v = (pos_v < 110) ? 110 : pos_v;
        break;
      case 'd':
        pos_v += 10;
        pos_v = (pos_v < 110) ? 110 : pos_v;
        break;
      case 'L':
        pos_h -= 30;
        pos_h = (pos_h < 0) ? 0 : pos_h;
        break;
      case 'l':
        pos_h -= 15;
        pos_h = (pos_h < 0) ? 0 : pos_h;
        break;
      case 'R':
        pos_h += 30;
        pos_h = (pos_h > 180) ? 180 : pos_h;
        break;
      case 'r':
        pos_h += 15;
        pos_h = (pos_h > 180) ? 180 : pos_h;
        break;
    }
  }
  delay(100);           // Wait 2000 milliseconds (2 seconds)
  moveto();
}

void moveto() {
  servoHorizontal.write(pos_h);  
  servoVertical.write(pos_v);
}
