$(function() {
    //watt : realpower (Watt (Joule/Detik)) || voltampere : apparentpower (VA) || cosphi : faktordaya (Tidak memiliki satuan) || Vrms : tegangan rata2 (Volt (V)) || Irms : arus (Ampere (A)) 
    var wattR = [], voltampereR = [], cosphiR = [], vrmsR = [], irmsR = [];
    var wattS = [], voltampereS = [], cosphiS = [], vrmsS = [], irmsS = [];
    var wattT = [], voltampereT = [], cosphiT = [], vrmsT = [], irmsT = [];
    var temperature = [];
    var datasetR, datasetS, datasetT, datasetTemp;
    var totalPointsR = 100, totalPointsS = 100, totalPointsT = 100, totalPointsTemp = 100;
    var updateIntervalR = 5000;
    var updateIntervalS = 5000;
    var updateIntervalT = 5000;
    var updateIntervalTemp = 5000;
    var nowR = new Date().getTime();
    var nowS = new Date().getTime();
    var nowT = new Date().getTime();
    var nowTemp = new Date().getTime();

    var options = {
        series: {
            lines: {
                lineWidth: 1.2
            },
            bars: {
                align: "center",
                fillColor: { colors: [{ opacity: 1 }, { opacity: 1}] },
                barWidth: 500,
                lineWidth: 1
            }
        },
        xaxis: {
            mode: "time",
            tickSize: [60, "second"],
            tickFormatter: function (v, axis) {
                var date = new Date(v);

                if (date.getSeconds() % 20 == 0) {
                    var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
                    var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
                    var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();

                    return hours + ":" + minutes + ":" + seconds;
                } else {
                    return "";
                }
            },
            axisLabel: "Time",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
        },
        yaxes: [
            {
                min: 0,
                max: 900,
                tickSize: 25,
                tickFormatter: function (v, axis) {
                    if (v % 50 == 0) {
                        return v + "";
                    } else {
                        return "";
                    }
                },
                axisLabel: "Label 1",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 6
            },
            {
                min: 0,
                max: 1,
                tickSize: 0.1,
                tickFormatter: 0.1,
                position: "right",
                axisLabel: "Label 2",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 6
            }, {
                min: 0,
                max: 20,
                tickSize: 5,
                tickFormatter: function (v, axis2) {
                    if (v % 5 == 0) {
                        return v + "";
                    } else {
                        return "";
                    }
                },
                position: "right",
                axisLabel: "Label 2",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 6
            }
        ],
        legend: {
            noColumns: 0,
            position:"nw"
        },
        grid: {      
            backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
        }
    };
    
    var options2 = {
        series: {
            lines: {
                lineWidth: 1.2
            },
            bars: {
                align: "center",
                fillColor: { colors: [{ opacity: 1 }, { opacity: 1}] },
                barWidth: 500,
                lineWidth: 1
            }
        },
        xaxis: {
            mode: "time",
            tickSize: [60, "second"],
            tickFormatter: function (v, axis) {
                var date = new Date(v);

                if (date.getSeconds() % 20 == 0) {
                    var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
                    var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
                    var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();

                    return hours + ":" + minutes + ":" + seconds;
                } else {
                    return "";
                }
            },
            axisLabel: "Time",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
        },
        yaxes: [
            {
                min: 0,
                max: 100,
                tickSize: 10,
                tickFormatter: 10,
                position: "right",
                axisLabel: "Label 2",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 6
            }
        ],
        legend: {
            noColumns: 0,
            position:"nw"
        },
        grid: {      
            backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
        }
    };

    function initDataR() {
        for (var i = 0; i < totalPointsR; i++) {
            var tempR = [nowR += updateIntervalR, 0];

            wattR.push(tempR);
            voltampereR.push(tempR);
            cosphiR.push(tempR);
            vrmsR.push(tempR);
            irmsR.push(tempR);
        }
    }

    function initDataS() {
        for (var l = 0; l < totalPointsS; l++) {
            var tempS = [nowS += updateIntervalS, 0];

            wattS.push(tempS);
            voltampereS.push(tempS);
            cosphiS.push(tempS);
            vrmsS.push(tempS);
            irmsS.push(tempS);
        }
    }
    
    function initDataT() {
        for (var r = 0; r < totalPointsT; r++) {
            var tempT = [nowT += updateIntervalT, 0];

            wattT.push(tempT);
            voltampereT.push(tempT);
            cosphiT.push(tempT);
            vrmsT.push(tempT);
            irmsT.push(tempT);
        }
    }
    
    function initDataTemp() {
        for (var j = 0; j < totalPointsTemp; j++) {
            var tempTemp = [nowTemp += updateIntervalTemp, 0];

            temperature.push(tempTemp);
        }
    }


    function GetDataR() {
        $.ajaxSetup({ cache: false });

        $.ajax({
            url: "http://localhost/ummenergy/sensing/_sensing-pltmh-data-r.php",
            dataType: 'json',
            success: updateR,
            error: function () {
                setTimeout(GetDataR, updateIntervalR);
            }
        });
    }

    function GetDataS() {
        $.ajaxSetup({ cache: false });

        $.ajax({
            url: "http://localhost/ummenergy/sensing/_sensing-pltmh-data-s.php",
            dataType: 'json',
            success: updateS,
            error: function () {
                setTimeout(GetDataS, updateIntervalS);
            }
        });
    }
    
    function GetDataT() {
        $.ajaxSetup({ cache: false });

        $.ajax({
            url: "http://localhost/ummenergy/sensing/_sensing-pltmh-data-t.php",
            dataType: 'json',
            success: updateT,
            error: function () {
                setTimeout(GetDataT, updateIntervalT);
            }
        });
    }
    
    function GetDataTemp() {
        $.ajaxSetup({ cache: false });

        $.ajax({
            url: "http://localhost/ummenergy/sensing/_sensing-temp-data.php",
            dataType: 'json',
            success: updateTemp,
            error: function () {
                setTimeout(GetDataTemp, updateIntervalTemp);
            }
        });
    }
    
    var tempR;

    function updateR(_dataR) {
        wattR.shift();
        voltampereR.shift();
        cosphiR.shift();
        vrmsR.shift();
        irmsR.shift();

        nowR += updateIntervalR

        tempR = [nowR, _dataR.wattR];
        wattR.push(tempR);

        tempR = [nowR, _dataR.voltampereR];
        voltampereR.push(tempR);

        tempR = [nowR, _dataR.cosphiR];
        cosphiR.push(tempR);

        tempR = [nowR, _dataR.vrmsR];
        vrmsR.push(tempR);
        
        tempR = [nowR, _dataR.irmsR];
        irmsR.push(tempR);
        
        datasetR = [
            { label: "Real Power:" + _dataR.wattR + "W", data: wattR, lines: { fill: true, lineWidth: 1.2 }, color: "#00FF00" },
            { label: "Apparent Power:" + _dataR.voltampereR + "VA", data: voltampereR, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:" + _dataR.cosphiR + "", data: cosphiR, color: "#f60af3", lines: { lineWidth: 1.2}, yaxis: 2 },
            { label: "Voltage:" + _dataR.vrmsR + "V", data: vrmsR, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:" + _dataR.irmsR + "A", data: irmsR, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }        
        ];

        $.plot($("#phaseRAll"), datasetR, options);
        setTimeout(GetDataR, updateIntervalR);
    }
    
    var tempS;

    function updateS(_dataS) {
        wattS.shift();
        voltampereS.shift();
        cosphiS.shift();
        vrmsS.shift();
        irmsS.shift();

        nowS += updateIntervalS

        tempS = [nowS, _dataS.wattS];
        wattS.push(tempS);

        tempS = [nowS, _dataS.voltampereS];
        voltampereS.push(tempS);

        tempS = [nowS, _dataS.cosphiS];
        cosphiS.push(tempS);

        tempS = [nowS, _dataS.vrmsS];
        vrmsS.push(tempS);
        
        tempS = [nowS, _dataS.irmsS];
        irmsS.push(tempS);
        
        datasetS = [
            { label: "Real Power:" + _dataS.wattS + "W", data: wattS, lines: { fill: true, lineWidth: 1.2 }, color: "#00FF00" },
            { label: "Apparent Power:" + _dataS.voltampereS + "VA", data: voltampereS, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:" + _dataS.cosphiS + "", data: cosphiS, color: "#f60af3", lines: { lineWidth: 1.2}, yaxis: 2 },
            { label: "Voltage:" + _dataS.vrmsS + "V", data: vrmsS, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:" + _dataS.irmsS + "A", data: irmsS, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }        
        ];
        
        $.plot($("#phaseSAll"), datasetS, options);
        setTimeout(GetDataS, updateIntervalS);
    }
    
    var tempT;

    function updateT(_dataT) {
        wattT.shift();
        voltampereT.shift();
        cosphiT.shift();
        vrmsT.shift();
        irmsT.shift();

        nowT += updateIntervalT

        tempT = [nowT, _dataT.wattT];
        wattT.push(tempT);

        tempT = [nowT, _dataT.voltampereT];
        voltampereT.push(tempT);

        tempT = [nowT, _dataT.cosphiT];
        cosphiT.push(tempT);

        tempT = [nowT, _dataT.vrmsT];
        vrmsT.push(tempT);
        
        tempT = [nowT, _dataT.irmsT];
        irmsT.push(tempT);
        
        datasetT = [
            { label: "Real Power:" + _dataT.wattT + "W", data: wattT, lines: { fill: true, lineWidth: 1.2 }, color: "#00FF00" },
            { label: "Apparent Power:" + _dataT.voltampereT + "VA", data: voltampereT, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:" + _dataT.cosphiT + "", data: cosphiT, color: "#f60af3", lines: { lineWidth: 1.2}, yaxis: 2 },
            { label: "Voltage:" + _dataT.vrmsT + "V", data: vrmsT, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:" + _dataT.irmsT + "A", data: irmsT, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }        
        ];
        
        $.plot($("#phaseTAll"), datasetT, options);
        setTimeout(GetDataT, updateIntervalT);
    }

    var tempTemp;
    
    function updateTemp(_dataTemp) {
        temperature.shift();

        nowTemp += updateIntervalTemp

        tempTemp = [nowTemp, _dataTemp.temperature];
        temperature.push(tempTemp);
        
        datasetTemp = [
            { label: "Temperature:" + _dataTemp.temperature + "C", data: temperature, lines:{fill:true, lineWidth:1.2}, color: "#f2e900" }     
        ];

        $.plot($("#temperatureData"), datasetTemp, options2);
        setTimeout(GetDataTemp, updateIntervalTemp);
    }
    
    $(document).ready(function () {
        initDataR();
        initDataS();
        initDataT();
        initDataTemp();
        
        datasetR = [        
            { label: "Real Power:", data: wattR, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" },
            { label: "Apparent Power:", data: voltampereR, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:", data: cosphiR, color: "#f60af3", bars: { show: true }, yaxis: 2 },
            { label: "Voltage:", data: vrmsR, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:", data: irmsR, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }
        ];
        
        datasetS = [        
            { label: "Real Power:", data: wattS, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" },
            { label: "Apparent Power:", data: voltampereS, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:", data: cosphiS, color: "#f60af3", bars: { show: true }, yaxis: 2 },
            { label: "Voltage:", data: vrmsS, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:", data: irmsS, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }
        ];
        
        datasetT = [        
            { label: "Real Power:", data: wattT, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" },
            { label: "Apparent Power:", data: voltampereT, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:", data: cosphiT, color: "#f60af3", bars: { show: true }, yaxis: 2 },
            { label: "Voltage:", data: vrmsT, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:", data: irmsT, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }
        ];

        datasetTemp = [
            { label: "Temperature:", data: temperature, lines:{fill:true, lineWidth:1.2}, color: "#f2e900" }     
        ];

        $.plot($("#phaseRAll"), datasetR, options);
        $.plot($("#phaseSAll"), datasetS, options);
        $.plot($("#phaseTAll"), datasetT, options);
        $.plot($("#temperatureData"), datasetTemp, options2);
        setTimeout(GetDataR, updateIntervalR);
        setTimeout(GetDataS, updateIntervalS);
        setTimeout(GetDataT, updateIntervalT);
        setTimeout(GetDataTemp, updateIntervalTemp);
    });
});