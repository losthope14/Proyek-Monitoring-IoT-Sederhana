var firstClient = new Paho.Client("test.mosquitto.org", Number(8080), "ID - FlashYellow");
// var secondClient = new Paho.Client("test.mosquitto.org", Number(8080), "ID - NiceGuy");

firstClient.onConnectionLost = OnConnectionLost;
firstClient.onMessageArrived = OnMessageArrived;

// secondClient.onConnectionLost = secondClientOnConnectionLost;
// secondClient.onMessageArrived = secondClientOnMessageArrived;

firstClient.connect({
    onSuccess: OnConnect
});

/*secondClient.connect({
    onSuccess: secondClientOnConnect
});*/

function OnConnect() {
    console.log('First client connected to broker');
    firstClient.subscribe('sc20mbkm/dht22sensor/#', { qos: 2 });
}

/*function secondClientOnConnect() {
    console.log('Second client connected to broker');
    secondClient.subscribe('sc20mbkm/dht22sensor/riverB/#', { qos: 2 });
}*/

function OnConnectionLost(responseObj) {
    if (responseObj != 0) {
        console.log('First Client Error: ' + responseObj.errorMessage);
    }
}

/*function secondClientOnConnectionLost(responseObj) {
    if (responseObj != 0) {
        console.log('Second Client Error: ' + responseObj.errorMessage);
    }
}*/

// Fungsi untuk menerima pesan dari mqtt broker
function OnMessageArrived(message) {
    if (message.destinationName == "sc20mbkm/dht22sensor/riverA/temperature") {
        var temperature = Number(message.payloadString);
        var payload = message.payloadString;
        var value = Number(payload);
        var date = new Date();

        temperatureDataGraphsA.addRow([date, value]);
        if (temperatureDataGraphsA.getNumberOfRows() > maxDataPoints) {
            temperatureDataGraphsA.removeRow(0);
        }

        dataHeightA.setValue(0, 1, temperature);
        chartHeightA.draw(dataHeightA, optionGauge);

        chartA.draw(temperatureDataGraphsA, optionGraphA);
        console.log("River A - Received message (Temperature): " + temperature);
    }

    if (message.destinationName == "sc20mbkm/dht22sensor/riverA/humidity") {
        var humidity = Number(message.payloadString);
        var payload = message.payloadString;
        var value = Number(payload);
        var date = new Date();

        dataColorA.setValue(0, 1, humidity);
        chartColorA.draw(dataColorA, optionGauge);

        console.log("River A - Received message (Humidity): " + humidity);
    }

    if (message.destinationName == "sc20mbkm/dht22sensor/riverB/temperature") {
        var temperature = Number(message.payloadString);
        var payload = message.payloadString;
        var value = Number(payload);
        var date = new Date();

        temperatureDataGraphsB.addRow([date, value]);
        if (temperatureDataGraphsB.getNumberOfRows() > maxDataPoints) {
            temperatureDataGraphsB.removeRow(0);
        }

        dataHeightB.setValue(0, 1, temperature);
        chartHeightB.draw(dataHeightB, optionGauge);

        chartB.draw(temperatureDataGraphsB, optionGraphB);
        console.log("River B - Received message (Temperature): " + temperature);
    }

    if (message.destinationName == "sc20mbkm/dht22sensor/riverB/humidity") {
        var humidity = Number(message.payloadString);
        var payload = message.payloadString;
        var value = Number(payload);
        var date = new Date();

        dataColorB.setValue(0, 1, humidity);
        chartColorB.draw(dataColorB, optionGauge);

        console.log("River B - Received message (Humidity): " + humidity);
    }
}

/*function secondClientOnMessageArrived(message) {
    if (message.destinationName == "sc20mbkm/dht22sensor/riverB/temperature") {
        var temperature = Number(message.payloadString);
        var payload = message.payloadString;
        var value = Number(payload);
        var date = new Date();

        temperatureDataGraphsB.addRow([date, value]);
        if (temperatureDataGraphsB.getNumberOfRows() > maxDataPoints) {
            temperatureDataGraphsB.removeRow(0);
        }

        dataHeightB.setValue(0, 1, temperature);
        chartHeightB.draw(dataHeightB, optionGauge);

        chartB.draw(temperatureDataGraphsB, optionGraphB);
        console.log("Second Client - Received message (Temperature): " + temperature);
    }
    else if (message.destinationName == "sc20mbkm/dht22sensor/riverB/humidity") {
        var humidity = Number(message.payloadString);
        var payload = message.payloadString;
        var value = Number(payload);
        var date = new Date();

        dataColorB.setValue(0, 1, humidity);
        chartColorB.draw(dataColorB, optionGauge);

        console.log("Second Client - Received message (Humidity): " + humidity);
    }
}*/