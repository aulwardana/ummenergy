$(function() {
    //watt : realpower (Watt (Joule/Detik)) || voltampere : apparentpower (VA) || cosphi : faktordaya (Tidak memiliki satuan) || Vrms : tegangan rata2 (Volt (V)) || Irms : arus (Ampere (A)) 
    var watt = [], voltampere = [], cosphi = [], vrms = [], irms = [], suhu = [];
    var watt3 = [], voltampere3 = [], cosphi3 = [], vrms3 = [], irms3 = [];
    var watt4 = [], voltampere4 = [], cosphi4 = [], vrms4 = [], irms4 = [];
    var dataset, dataset1, dataset2, dataset3;
    var totalPoints = 100, totalPoints2 = 100, totalPoints3 = 100, totalPoints4 = 100;
    var updateInterval = 5000;
    var updateInterval2 = 5000;
    var updateInterval3 = 5000;
    var updateInterval4 = 5000;
    var now = new Date().getTime();
    var now2 = new Date().getTime();
    var now3 = new Date().getTime();
    var now4 = new Date().getTime();

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

    function initData() {
        for (var i = 0; i < totalPoints; i++) {
            var temp = [now += updateInterval, 0];

            watt.push(temp);
            voltampere.push(temp);
            cosphi.push(temp);
            vrms.push(temp);
            irms.push(temp);
        }
    }
    
    function initData2() {
        for (var j = 0; j < totalPoints2; j++) {
            var temp2 = [now2 += updateInterval2, 0];

            suhu.push(temp2);
        }
    }
    
    function initData3() {
        for (var l = 0; l < totalPoints3; l++) {
            var temp3 = [now3 += updateInterval3, 0];

            watt3.push(temp3);
            voltampere3.push(temp3);
            cosphi3.push(temp3);
            vrms3.push(temp3);
            irms3.push(temp3);
        }
    }
    
    function initData4() {
        for (var r = 0; r < totalPoints3; r++) {
            var temp4 = [now4 += updateInterval4, 0];

            watt4.push(temp4);
            voltampere4.push(temp4);
            cosphi4.push(temp4);
            vrms4.push(temp4);
            irms4.push(temp4);
        }
    }


    function GetData() {
        $.ajaxSetup({ cache: false });

        $.ajax({
            url: "http://pltmh.ummenergy.com/jsonchart.php",
            dataType: 'json',
            success: update,
            error: function () {
                setTimeout(GetData, updateInterval);
            }
        });
    }
    
    function GetData2() {
        $.ajaxSetup({ cache: false });

        $.ajax({
            url: "http://pltmh.ummenergy.com/jsonsuhuchart.php",
            dataType: 'json',
            success: update2,
            error: function () {
                setTimeout(GetData2, updateInterval2);
            }
        });
    }
    
    function GetData3() {
        $.ajaxSetup({ cache: false });

        $.ajax({
            url: "http://pltmh.ummenergy.com/jsonchart2.php",
            dataType: 'json',
            success: update3,
            error: function () {
                setTimeout(GetData3, updateInterval3);
            }
        });
    }
    
    function GetData4() {
        $.ajaxSetup({ cache: false });

        $.ajax({
            url: "http://pltmh.ummenergy.com/jsonchart3.php",
            dataType: 'json',
            success: update4,
            error: function () {
                setTimeout(GetData4, updateInterval4);
            }
        });
    }
    
    var temp;

    function update(_data) {
        watt.shift();
        voltampere.shift();
        cosphi.shift();
        vrms.shift();
        irms.shift();

        now += updateInterval

        temp = [now, _data.watt];
        watt.push(temp);

        temp = [now, _data.voltampere];
        voltampere.push(temp);

        temp = [now, _data.cosphi];
        cosphi.push(temp);

        temp = [now, _data.vrms];
        vrms.push(temp);
        
        temp = [now, _data.irms];
        irms.push(temp);
        
        dataset = [
            { label: "Real Power:" + _data.watt + "W", data: watt, lines: { fill: true, lineWidth: 1.2 }, color: "#00FF00" },
            { label: "Apparent Power:" + _data.voltampere + "VA", data: voltampere, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:" + _data.cosphi + "", data: cosphi, color: "#f60af3", lines: { lineWidth: 1.2}, yaxis: 2 },
            { label: "Voltage:" + _data.vrms + "V", data: vrms, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:" + _data.irms + "A", data: irms, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }        
        ];

        $.plot($("#placeholder"), dataset, options);
        setTimeout(GetData, updateInterval);
    }
    
    var temp2;

    function update2(_data2) {
        suhu.shift();

        now2 += updateInterval2

        temp2 = [now, _data2.suhu];
        suhu.push(temp2);
        
        dataset1 = [
            { label: "Suhu:" + _data2.suhu + "C", data: suhu, lines:{fill:true, lineWidth:1.2}, color: "#f2e900" }     
        ];

        $.plot($("#placeholder2"), dataset1, options2);
        setTimeout(GetData2, updateInterval2);
    }
    
    var temp3;

    function update3(_data3) {
        watt3.shift();
        voltampere3.shift();
        cosphi3.shift();
        vrms3.shift();
        irms3.shift();

        now3 += updateInterval3

        temp3 = [now3, _data3.watt3];
        watt3.push(temp3);

        temp3 = [now3, _data3.voltampere3];
        voltampere3.push(temp3);

        temp3 = [now3, _data3.cosphi3];
        cosphi3.push(temp3);

        temp3 = [now3, _data3.vrms3];
        vrms3.push(temp3);
        
        temp3 = [now3, _data3.irms3];
        irms3.push(temp3);
        
        dataset2 = [
            { label: "Real Power:" + _data3.watt3 + "W", data: watt3, lines: { fill: true, lineWidth: 1.2 }, color: "#00FF00" },
            { label: "Apparent Power:" + _data3.voltampere3 + "VA", data: voltampere3, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:" + _data3.cosphi3 + "", data: cosphi3, color: "#f60af3", lines: { lineWidth: 1.2}, yaxis: 2 },
            { label: "Voltage:" + _data3.vrms3 + "V", data: vrms3, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:" + _data3.irms3 + "A", data: irms3, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }        
        ];
        
        $.plot($("#placeholder3"), dataset2, options);
        setTimeout(GetData3, updateInterval3);
    }
    
    var temp4;

    function update4(_data4) {
        watt4.shift();
        voltampere4.shift();
        cosphi4.shift();
        vrms4.shift();
        irms4.shift();

        now4 += updateInterval4

        temp4 = [now4, _data4.watt4];
        watt4.push(temp3);

        temp4 = [now4, _data4.voltampere4];
        voltampere4.push(temp4);

        temp4 = [now4, _data4.cosphi4];
        cosphi4.push(temp4);

        temp4 = [now4, _data4.vrms4];
        vrms4.push(temp4);
        
        temp4 = [now4, _data4.irms4];
        irms4.push(temp4);
        
        dataset3 = [
            { label: "Real Power:" + _data4.watt4 + "W", data: watt4, lines: { fill: true, lineWidth: 1.2 }, color: "#00FF00" },
            { label: "Apparent Power:" + _data4.voltampere3 + "VA", data: voltampere4, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:" + _data4.cosphi4 + "", data: cosphi4, color: "#f60af3", lines: { lineWidth: 1.2}, yaxis: 2 },
            { label: "Voltage:" + _data4.vrms4 + "V", data: vrms4, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:" + _data4.irms4 + "A", data: irms4, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }        
        ];
        
        $.plot($("#placeholder4"), dataset3, options);
        setTimeout(GetData4, updateInterval4);
    }
    
    $(document).ready(function () {
        initData();
        initData2();
        initData3();
        initData4();
        
        dataset = [        
            { label: "Real Power:", data: watt, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" },
            { label: "Apparent Power:", data: voltampere, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:", data: cosphi, color: "#f60af3", bars: { show: true }, yaxis: 2 },
            { label: "Voltage:", data: vrms, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:", data: irms, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }
        ];
        
        dataset1 = [
            { label: "Suhu:", data: suhu, lines:{fill:true, lineWidth:1.2}, color: "#f2e900" }     
        ];
        
        dataset2 = [        
            { label: "Real Power:", data: watt3, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" },
            { label: "Apparent Power:", data: voltampere3, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:", data: cosphi3, color: "#f60af3", bars: { show: true }, yaxis: 2 },
            { label: "Voltage:", data: vrms3, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:", data: irms3, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }
        ];
        
        dataset3 = [        
            { label: "Real Power:", data: watt4, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" },
            { label: "Apparent Power:", data: voltampere4, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:", data: cosphi4, color: "#f60af3", bars: { show: true }, yaxis: 2 },
            { label: "Voltage:", data: vrms4, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:", data: irms4, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }
        ];

        $.plot($("#placeholder"), dataset, options);
        $.plot($("#placeholder2"), dataset1, options2);
        $.plot($("#placeholder3"), dataset2, options);
        $.plot($("#placeholder4"), dataset3, options);
        setTimeout(GetData, updateInterval);
        setTimeout(GetData2, updateInterval2);
        setTimeout(GetData3, updateInterval3);
        setTimeout(GetData4, updateInterval4);
    });
});