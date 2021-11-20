$("#btncal").click(function(){
    var icc = $("#icc").val();
    var voc = $("#voc").val();
    var iinc = $("#iinc").val();
    var k = $("#k").val();
    var s = $("#s").val();
    let res = (icc * voc)/iinc*k*s;
    $("#res").val(res);
    });