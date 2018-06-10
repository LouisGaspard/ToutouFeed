import sys
import time
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)

StepPins = [18,23,24,25]

for pin in StepPins:
  GPIO.setup(pin,GPIO.OUT)
  GPIO.output(pin, False)

Seq = [[0,0,1,1],
       [1,0,0,1],
       [1,1,0,0],
       [0,1,1,0]]
       
StepCount = len(Seq)

StepDir = 1

if len(sys.argv)>1:
  WaitTime = int(sys.argv[1])/float(1000)
else:
  WaitTime = 10/float(1000)


StepCounter = 0

fichier = open("/var/www/new/doses.txt","r")
n=(int(fichier.readline())*509)

while n>0:
  print(n)
  for pin in range(0, 4):
    xpin = StepPins[pin]
    if Seq[StepCounter][pin]!=0:

      GPIO.output(xpin, True)
    else:
      GPIO.output(xpin, False)

  StepCounter += StepDir
  n=n-1

  if (StepCounter>=StepCount):
    StepCounter = 0
  if (StepCounter<0):
    StepCounter = StepCount+StepDir
 

  time.sleep(WaitTime)

fichier.close()

fichier=open("/var/www/new/doses.txt","w")
fichier.write("0")
fichier.close()
