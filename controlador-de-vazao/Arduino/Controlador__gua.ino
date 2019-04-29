#include <ESP8266WiFi.h>

void recebe();
void incrpulso();
String aux;
float valor;

int Pulso; //Variável para a quantidade de pulsos

float vazaoagua; //Variável para armazenar o valor em L/min
float MiliLitros;

// Nome do seu wifi
const char* ssid = "teste"; 

// Senha do seu wifi
const char* password = "teste123"; 

//DEFINIÇÃO DE IP FIXO PARA O NODEMCU
IPAddress ip(192,168,0,106); //IP 
IPAddress gateway(192,168,0,1); //GATEWAY DE CONEXÃO (ALTERE PARA O GATEWAY DO SEU ROTEADOR)
IPAddress subnet(255,255,255,0); //MASCARA DE REDE

// Porta de comunicacao (normalmente se utiliza a 80 ou 8080)
WiFiServer server(80);
WiFiClient cliente;

void setup() {
 Serial.begin(115200); 
  delay(10);

  // Mostra no monitor serial informacoes de conexao da rede
  Serial.println();
  Serial.println();
  Serial.print("conectando em ");
  Serial.println(ssid);
  
  // Inicializando a conexao

  WiFi.begin(ssid, password); //PASSA OS PARÂMETROS PARA A FUNÇÃO QUE VAI FAZER A CONEXÃO COM A REDE SEM FIO
  WiFi.config(ip, gateway, subnet); //PASSA OS PARÂMETROS PARA A FUNÇÃO QUE VAI SETAR O IP FIXO NO NODEMCU
  
  /* Enquanto nao conseguir conectar
    imprime um ponto na tela (dá a ideia de que esta carregando) */
  
  while (WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print("."); 
  }

  Serial.println("");
  Serial.println("WiFi connectado");

  // Inicializa o servidor (nesse caso o proprio esp8266)
  server.begin();
  Serial.println("Servidor inicializado");
  
  // Mostra o IP do servidor
  Serial.println(WiFi.localIP()); 
  
  pinMode(D2, INPUT);
  pinMode(D7, OUTPUT);
  attachInterrupt(D2, incrpulso, RISING); //Configura a porta digital D2, para interrupção
}

void loop() {
  recebe();
  if(valor>0)
  {
    MiliLitros=0;
    while(valor>MiliLitros)
    {
      Pulso = 0; //Começa do 0 variável para contar os giros das pás internas,em segundos
      digitalWrite(D7, HIGH);  
      sei(); //liga interrupção
      delay (1000); //Espera
      cli(); //Desliga interrupção
      Serial.println(MiliLitros); //Imprime na serial o valor da vazão
      Serial.print(" MiliLitros - "); //Imprime L/min;
      vazaoagua = Pulso / 5.5; //Converte para Litros/minuto
      MiliLitros=(vazaoagua/60)*1000 + MiliLitros;
    }
    digitalWrite(D7, LOW);
    valor=0;
    Serial.println("Pronto");
  }
}
void recebe()
{
  cliente = server.available(); 
  
  if (cliente.available()) { 
  // Lê caracteres do buffer serial
    String req = cliente.readStringUntil('\n');
    req = req.substring(req.indexOf("/") + 1, req.indexOf("HTTP") - 1);
    valor=req.toFloat();
    Serial.println(valor);
    Serial.println(".");
    Serial.println("Cliente desconectado");
  }else{
    Serial.println("Não tem nada");
  }
  cliente.flush();
  cliente.stop();
  delay(1000);
}

 
void incrpulso ()
{ 
  Pulso++;
}

