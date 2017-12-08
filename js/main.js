var rect_x_offset=0; 
var rect_y_offset=0;
var art_width =0, art_height=0;
var mockup_img_width, mockup_img_height;
var pattern_img_width, pattern_img_height;
var initial_rate=1;
var extension_type="";
var c = document.createElement('canvas');
var ctx=c.getContext("2d");
c.width = document.getElementById('mockup-image').offsetWidth;
c.height = window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75;
c.id = 'c';
document.getElementById('mockup-image').append(c);

var c1;
var canvas1 = new fabric.Canvas('c');
f = fabric.Image.filters;
var mockup_img, pattern_img, shaodw_img, texture_dark_img = null, texture_white_img = null; 
var square,square1, set_flag = true;
var square_rate ;
var red_x_offset;
var red_y_offset;
var black_y_offset;
var edit_status = false;
var basic_image_width = 300;
var image_size_scale = 0.4;
var total_data={}, url_flag = false;
var mockup_image_before_width,mockup_image_before_height;
var mockup_image_before_left, mockup_image_before_top;
var clip_left_x, clip_left_y, clip_right_x, clip_right_y;
var wheelGroup, test, stopE, getWheel, dropWheel,myEntity;
var this_pattern_url ="";
var data1, resize_flag=0;
var cropper;
var alert_text;
var canvas_pattern =  document.createElement("canvas");
init_selectbox();


var loader1 = document.createElement('div');
loader1.className="loader1";

$("#loader_parent").append(loader1);
$(".loader1").css("left",window.innerWidth/2-40);
$(".loader1").css("top",window.innerHeight/2+5);
$(".loader1").hide();
mockup_image_before_width = document.getElementById('mockup-image').offsetWidth;
mockup_image_before_height = window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-35-65;
document.getElementById("mockup_moto").style.left = (document.getElementById('mockup-image').offsetLeft+ document.getElementById('mockup-image').offsetWidth / 2-100)+"px";
document.getElementById("mockup_moto").style.top = (document.getElementById('mockup-image').offsetTop+document.getElementById('mockup-image').offsetHeight / 2-100)+"px";
document.getElementsByClassName('img-container')[0].style.height = (window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75)*1.1 +"px";


$("body").on("contextmenu",function(e){
    return false;
});

$("#export-button").prop("disabled", true);
$("#export-art-button").prop("disabled", true);
$("#upload-button").prop("disabled", true);
// $("body").bind('cut copy paste', function (e) {
//     e.preventDefault();
// });

var waitForFinalEvent = (function () {
  var timers = {};
  return function (callback, ms, uniqueId) {
    if (!uniqueId) {
      uniqueId = "Don't call this twice without a uniqueId";
    }
    if (timers[uniqueId]) {
      clearTimeout (timers[uniqueId]);
    }
    timers[uniqueId] = setTimeout(callback, ms);
  };
})();

function download_update() {
  var url = 'upload.php';
  var _URL = window.URL || window.webkitURL;
  var xhr = new XMLHttpRequest();
  var fd = new FormData();
  url_flag = false;
  xhr.open("POST", url, true);
  xhr.onreadystatechange = function() {
    if(xhr.readyState == 4 && xhr.status == 200) {
        // console.log(xhr.responseText);
    }
  }
  fd.append("userid", userid);
  fd.append("downloads1", downloads1);
  fd.append("downloads2", downloads2);
  xhr.send(fd);
}

console.log(showflag);
console.log((getURLParameter('url')==null));
if((showflag != "1") || (getURLParameter('url')!=null)) {
    if(getURLParameter("url") =="" )
    {
        $("#do_modal_instruction").click();
    } else if(getURLParameter("url")){
        // $("#export-art-button").prop("disabled", false);
        $("#export-button").prop("disabled", false);
    }
}

function oninsruction() {
    $.ajax({
        url: "upload.php",
        method: "POST",
        data: { showflag: 1, userid: userid},
        success: function(resp){  
            // console.log(resp);
        }
    });
}
$(window).resize(function() {
  resize_flag=0;
  console.log("resize");
  waitForFinalEvent(function(){
        
        document.getElementById("product_list").style.width = document.getElementById("product_list").parentNode.parentNode.offsetWidth+"px";
        var offset_xxx1 = (mockup_image_before_width - document.getElementById('mockup-image').offsetWidth)/2;
        mockup_image_before_width = document.getElementById('mockup-image').offsetWidth;
        var offset_yyy1 = (mockup_image_before_height - (window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-35-65))/2;
        mockup_image_before_height =  window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-35-65;
      
        c.width = document.getElementById('mockup-image').offsetWidth;
        c.height = window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75;

        $(".loader1").css("left",window.innerWidth/2-40);
        $(".loader1").css("top",window.innerHeight/2-40);
        document.getElementById('mockup-image').innerHTML = "";
        document.getElementById('mockup-image').append(c);
        // canvas.width = c.width;
        // canvas.height = c.height;
        canvas1 = new fabric.Canvas('c');
        // console.log(mockup_image_before_width+","+mockup_img.top);
        if(pattern_img) {
            pattern_img.left = pattern_img.left - offset_xxx1;
            pattern_img.top = pattern_img.top - offset_yyy1;
            // pattern_img.left = pattern_img.left - (mockup_img.left-mockup_image_before_left);
        }
        // mockup_image_before_left = mockup_img.left;
        canvas1.on('mouse:down', function(e) { 
            // e.target should be the circle
            if((e.target == null) && (pattern_img) && (set_flag)) {
                getProductImage();
            }
            var xx= e.e.layerX;
            var yy = e.e.layerY;
            if($("#product_name_label").val() != "Select Mockup") {
                if(total_data[$("#product_list option:selected").text()].perspective != 1) {
                    if(xx > mockup_img.left && xx < mockup_img.left + mockup_img.width*mockup_img.scaleX && yy > mockup_img.top && yy < mockup_img.top + mockup_img.height*mockup_img.scaleY){

                        if(pattern_img){
                            // canvas1.remove(square1);
                            // canvas1.remove(square);
                            // canvas1.add(square1);
                            // canvas1.add(square);
                            // document.getElementById("c").style.maskImage = "";
                            // document.getElementById("c").style.webkitMaskImage = "";
                            // document.getElementById("c").classList.remove("mask-class");
                            // canvas1.remove(pattern_img);
                            if(total_data[$("#product_list option:selected").text()].blend_mode)
                                pattern_img.globalCompositeOperation = total_data[$("#product_list option:selected").text()].blend_mode;
                            else
                                pattern_img.globalCompositeOperation = 'multiply';
                            // canvas1.add(pat);
                            pattern_img.selectable = true;
                            canvas1.setActiveObject(pattern_img);
                            set_flag = true;
                        }
                    }
                }
            }
        });

        canvas1.on('object:scaling', function(){
            var obj = canvas1.getActiveObject();
        });
        if($("#product_name_label").val() != "Select Mockup") {
            if(pattern_img)
                product_load(true);
            else
                product_load(false);
        }
    }, 300, "some unique string");
});

function inst_domodal() {
    $("#do_modal_instruction").click();
}
function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}


$("#product_name_label").click(function(ev) {
    ev.stopPropagation();
    var obj =  $("#product_name_label").closest('div').find('select')['0'];
    if(obj.style.display != "block") {
        obj.style.display = "block";
    } else {
        obj.style.display = "none";
    }
});
$("#caret").click(function(ev) {
    ev.stopPropagation();
    // console.log($("#product_name_label").closest('div').find('select')['0']);
    var obj =  $("#product_name_label").closest('div').find('select')['0'];
    if(obj.style.display != "block") {
        obj.style.display = "block";
    } else {
        obj.style.display = "none";
    }
});
$("#product_list").click(function(ev) {
    ev.stopPropagation();
    this_pattern_url = "";
    $("#upload-button").prop("disabled", false);
    $("#export-art-button").prop("disabled", true);
    $("#export-button").prop("disabled", true);
    $("#product_list").hide().closest('div').find('input').val($("#product_list").find('option:selected').text());
    url_flag = false;
    // canvas1.remove(alert_text);
    document.getElementById("mockup_moto").style.display = "none";
    product_load();
})

function resetpassword() {
    window.location.href="reset.php?userid=" + userid ;
}
function init_selectbox() {
    var url = 'getfilelist.php';
    var xhr = new XMLHttpRequest();
    var fd = new FormData();
    xhr.open("POST", url, true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var text= xhr.responseText;
            // console.log(text);
            
            text = text.split("ADMINSEPERATE");
            // $("#product_list").append($('<option>', {
            //     value: "",
            //     text: "--Select Mockup--",
            //     disabled: true,
            //     selected: true
            // }));
            $("#product_list").append($('<optgroup>', {
                label: "Nymbl Mockups"
            }));
            var lines = text[0].split("<br>");
            var param_product = getURLParameter('product');
            var exist_flag = false;
            
            for(var j=0; j<lines.length-1; j++) {
                
                var arrs = lines[j].split(" width:");
                var name = arrs[0].split("name:")[1];
                arrs = arrs[1].split(" ");
                var wid_val = arrs[0];
                var he_val = arrs[1].split("height:")[1];
                var rect_x_offset1 = arrs[2].split("x:")[1];
                var rect_y_offset1 = arrs[3].split("y:")[1];
                var blend_mode, opacity, url_path;
                if(arrs[4])
                    blend_mode = arrs[4].split("blend_mode:")[1];
                if(arrs[5])
                    opacity = arrs[5].split("opacity:")[1];
                //name:AAA width:0 height:0 x:0 y:0 blend_mode:multiply opacity:100 
                //admin: mockup_list:false top_left_x:50 top_left_y:181 top_right_x:273 
                //top_right_y:264 bottom_left_x:50 bottom_left_y:481 bottom_right_x:350 
                //bottom_right_y:481
                // console.log(lines[j]);
                var top_left_x = arrs[8].split("top_left_x:")[1];
                var top_left_y = arrs[9].split("top_left_y:")[1];
                var top_right_x = arrs[10].split("top_right_x:")[1];
                var top_right_y = arrs[11].split("top_right_y:")[1];
                var bottom_left_x = arrs[12].split("bottom_left_x:")[1];
                var bottom_left_y = arrs[13].split("bottom_left_y:")[1];
                var bottom_right_x = arrs[14].split("bottom_right_x:")[1];
                var bottom_right_y = arrs[15].split("bottom_right_y:")[1];
                var perspective = arrs[16].split("perspective:")[1];
                var position_x = arrs[17].split("position_x:")[1];
                var position_y = arrs[18].split("position_y:")[1];
                var size_x = arrs[19].split("size_x:")[1];
                var size_y = arrs[20].split("size_y:")[1];
                var cheight = arrs[21].split("cheight:")[1];
                var dpi = arrs[22].split("dpi:")[1];
                var texture_dark_flag = arrs[23].split("texture_dark:")[1];
                var texture_white_flag = arrs[24].split("texture_white:")[1];
                var dtg = arrs[25].split("dtg:")[1];
                // console.log(position_x+","+position_y+","+size_x+","+size_y);
                total_data[name]={width: wid_val, height: he_val, x: rect_x_offset1, y: rect_y_offset1, blend_mode: blend_mode, opacity: opacity, top_left_x: top_left_x, top_left_y: top_left_y, top_right_x: top_right_x, top_right_y: top_right_y, bottom_left_x: bottom_left_x, bottom_left_y: bottom_left_y, bottom_right_x: bottom_right_x, bottom_right_y: bottom_right_y, perspective: perspective, position_x: position_x, position_y: position_y, size_x: size_x, size_y: size_y, cheight: cheight, dpi: dpi, texture_dark_flag: texture_dark_flag, texture_white_flag: texture_white_flag, dtg: dtg};
                // if(name == param_product)
                //     exist_flag = true;
                $("#product_list").append($('<option>', {
                    value: name,
                    text: name
                }));
                
            }
            if(text.length>1) {
                $("#product_list").append($('<optgroup>', {
                    label: "My Custom Mockups",
                }));

                lines = text[1].split("<br>");
                // console.log(lines.length);
                if(lines.length == 1) {
                     $("#product_list").append($('<option>', {
                        text: "Click Creator Tool Above To Add",
                        style: "",
                        disabled: true
                    }));
                }
                for(var j=0; j<lines.length-1; j++) {
                    
                    var arrs = lines[j].split(" width:");
                    var name = arrs[0].split("name:")[1];
                    arrs = arrs[1].split(" ");
                    var wid_val = arrs[0];
                    var he_val = arrs[1].split("height:")[1];
                    var rect_x_offset1 = arrs[2].split("x:")[1];
                    var rect_y_offset1 = arrs[3].split("y:")[1];
                    var blend_mode, opacity, url_path;
                    if(arrs[4])
                        blend_mode = arrs[4].split("blend_mode:")[1];
                    if(arrs[5])
                        opacity = arrs[5].split("opacity:")[1];
                    //name:AAA width:0 height:0 x:0 y:0 blend_mode:multiply opacity:100 
                    //admin: mockup_list:false top_left_x:50 top_left_y:181 top_right_x:273 
                    //top_right_y:264 bottom_left_x:50 bottom_left_y:481 bottom_right_x:350 
                    //bottom_right_y:481
                    // console.log(lines[j]);
                    var top_left_x = arrs[8].split("top_left_x:")[1];
                    var top_left_y = arrs[9].split("top_left_y:")[1];
                    var top_right_x = arrs[10].split("top_right_x:")[1];
                    var top_right_y = arrs[11].split("top_right_y:")[1];
                    var bottom_left_x = arrs[12].split("bottom_left_x:")[1];
                    var bottom_left_y = arrs[13].split("bottom_left_y:")[1];
                    var bottom_right_x = arrs[14].split("bottom_right_x:")[1];
                    var bottom_right_y = arrs[15].split("bottom_right_y:")[1];
                    var perspective = arrs[16].split("perspective:")[1];
                    var position_x = arrs[17].split("position_x:")[1];
                    var position_y = arrs[18].split("position_y:")[1];
                    var size_x = arrs[19].split("size_x:")[1];
                    var size_y = arrs[20].split("size_y:")[1];
                    var cheight = arrs[21].split("cheight:")[1];
                    var dpi = arrs[22].split("dpi:")[1];
                    var texture_dark_flag = arrs[23].split("texture_dark:")[1];
                    var texture_white_flag = arrs[24].split("texture_white:")[1];
                    // console.log(position_x+","+position_y+","+size_x+","+size_y);
                    total_data[name]={width: wid_val, height: he_val, x: rect_x_offset1, y: rect_y_offset1, blend_mode: blend_mode, opacity: opacity, top_left_x: top_left_x, top_left_y: top_left_y, top_right_x: top_right_x, top_right_y: top_right_y, bottom_left_x: bottom_left_x, bottom_left_y: bottom_left_y, bottom_right_x: bottom_right_x, bottom_right_y: bottom_right_y, perspective: perspective, position_x: position_x, position_y: position_y, size_x: size_x, size_y: size_y, cheight: cheight, dpi: dpi, texture_dark_flag: texture_dark_flag, texture_white_flag: texture_white_flag};
                    // if(name == param_product)
                    //     exist_flag = true;
                    $("#product_list").append($('<option>', {
                        value: name,
                        text: name
                    }));
                    
                }
            }
            // console.log(total_data);
            $("#product_list").attr('size',15);
            $("#product_list").css('width',document.getElementById("product_list").parentNode.offsetWidth);
            // alert_text = new fabric.Text('Select Mockup',{left:parseFloat(c.style.width)/2-120, top:parseFloat(c.style.height)/2-50,fill:"black", selectable:false});
            // alert_text = new fabric.IText('Select Mockup', {
            //     left:parseFloat(c.style.width)/2-100, 
            //     top:parseFloat(c.style.height)/2-50,
            //     fill:"black", 
            //     fontFamily: 'sans-serif',
            //     fontSize: 30,
            //     selectable:false
            // });
            // canvas1.add(alert_text);
            canvas1.renderAll();
            if(getURLParameter("url")){
                // console.log(getURLParameter('url'));
                url_flag = true;
            }
            // if(exist_flag == false) {
            //     total_data[param_product]={width: getURLParameter("w"), height: getURLParameter("h"), x: getURLParameter("x"), y: getURLParameter("y"), blend_mode: getURLParameter("bm"), opaicty: getURLParameter("o"), url: getURLParameter("url")};
            //     $("#product_list").append($('<option>', {
            //         value: param_product,
            //         text: param_product
            //     }));
            // }

            if(param_product){
                document.getElementById("product_list").value = getURLParameter('product');
                $("#product_list").hide().closest('div').find('input').val(getURLParameter('product'));
            }
       
            
            if(($("#product_list option:selected").text()!='Select Mockup') && ($("#product_list").hide().closest('div').find('input').val() !='Select Mockup')) {
                $("#mockup_moto").hide();
                $("#product_list").hide().closest('div').find('input').val($("#product_list").find('option:selected').text());
                $(".loader1").show();
                $("#product_list").prop("disabled", true);
                product_load();
            }
        }
    }
    // console.log(adminid);
    fd.append("userid", userid);
    fd.append("adminid", adminid);
    xhr.send(fd);
}
// console.log(token);
if(downloads1 <= 0 || downloads2<=0){
    if(token ==""){
        $("#creator_tool_link").css('pointer-events', 'none');
        $("#download_error_modal_btn").click();
        $("#export-art-button").prop("disabled", true);
        $("#export-button").prop("disabled", true);
    }
}

$('#product_list').change(function() {
    
});
function product_load(fff = false, ggg=false) {
    canvas1.clear();
    if(downloads1 >0 && downloads2>0)
    {
        $("#upload-button").prop("disabled", false);
    }
    else {
        if(token =="") {
            $("#creator_tool_link").css('pointer-events', 'none');
            $("#download_error_modal_btn").click();
        } else {
            $("#upload-button").prop("disabled", false);
        }
    }
    $("#product_list").prop("disabled", true);
    art_width = total_data[$("#product_list option:selected").text()].width;
    art_height = total_data[$("#product_list option:selected").text()].height;
    
    rect_x_offset = total_data[$("#product_list option:selected").text()].x;
    rect_y_offset = total_data[$("#product_list option:selected").text()].y;
    document.getElementById("c").style.maskImage = "";
    document.getElementById("c").style.webkitMaskImage = "";
    document.getElementById("c").classList.remove("mask-class");
    // 
    $(".loader1").show();
    square_rate = total_data[$("#product_list option:selected").text()].width / total_data[$("#product_list option:selected").text()].height;
    if(mockup_img){
        
        canvas1.remove(shadow_img);
        // canvas1.remove(mockup_img);
        canvas1.remove(square);
        canvas1.remove(square1);
        canvas1.remove(texture_dark_img);
        canvas1.remove(texture_white_img);
        // texture_dark_img = null;
        // texture_white_img = null;
    }
    if(pattern_img) {
        
        canvas1.remove(pattern_img);
        canvas1.remove(texture_dark_img);
        canvas1.remove(texture_white_img);
    }
    fabric.Image.fromURL('img/product1/'+$("#product_list option:selected").text()+"-shadow.png", function(img) {
        image_size_scale = basic_image_width / img.width;
        mockup_img_width = img.width * image_size_scale;
        mockup_img_height = img.height * image_size_scale;
        shadow_img = img.set({ left: canvas1.width/2-mockup_img_width/2, top: canvas1.height/2-mockup_img_height/2, angle: 0, scaleX:image_size_scale, scaleY:image_size_scale, style:'opacity: 1;', selectable: false })
        fabric.Image.fromURL('img/product1/'+$("#product_list option:selected").text()+".png", function(img) {
            initial_rate = mockup_img_width / mockup_img_height;
            red_x_offset = 10;
            red_y_offset = canvas1.height/2-(mockup_img_width+20) /square_rate/2-(canvas1.height/2-mockup_img_width / square_rate/2);
            var rect_width = 1500-rect_x_offset*2;
            var rect_height = 1500-rect_y_offset*2;
            var xxx1 = 1500-rect_width;//1288, 
            var yyy1 = 1500-rect_height;//903;
            console.log(xxx1, yyy1);
            console.log(rect_x_offset);
            console.log(mockup_img_width+","+image_size_scale);
            square  = new fabric.Rect({ 
                width: mockup_img_width - xxx1*image_size_scale+20,//mockup_img_width+20, 
                height: mockup_img_height - yyy1*image_size_scale+20/square_rate,//(mockup_img_width+20) /square_rate, 
                left:  canvas1.width/2-(mockup_img_width - xxx1*image_size_scale)/2-10,//canvas1.width/2-(mockup_img_width+20)/2, 
                top:  canvas1.height/2-(mockup_img_height - yyy1*image_size_scale) /2-10/square_rate,//canvas1.height/2-(mockup_img_width+20) /square_rate/2, 
                strokeDashArray: [3, 3],
                stroke: 'red',
                fill: 'rgba(0,0,0,0)',
                strokeWidth: 1,
                selectable: false
            });
            // console.log(square);
            square1  = new fabric.Rect({ 
                width: mockup_img_width - xxx1*image_size_scale, 
                height: (mockup_img_width - yyy1*image_size_scale), 
                left:  canvas1.width/2-(mockup_img_width - xxx1*image_size_scale)/2, 
                top:  canvas1.height/2-(mockup_img_height - yyy1*image_size_scale) /2, 
                stroke: 'black',
                fill: 'rgba(0,0,0,0)',
                strokeWidth: 1,
                selectable: false
            });
            mockup_img = img.set({ left: canvas1.width/2-mockup_img_width/2, top: canvas1.height/2-mockup_img_height/2, angle: 0, scaleX:image_size_scale, scaleY:image_size_scale, style:'opacity: 1;', selectable: false })
            mockup_image_before_left = mockup_img.left;
            mockup_image_before_top = mockup_img.top;
            // console.log(image_size_scale);
            // mockup_img.setShadow({color:'grey', blur:70, offsetX:45, offsetY:45, opacity:1});
            black_y_offset = mockup_img.left - square.left;
            canvas1.add(shadow_img);
            canvas1.add(mockup_img);
            // canvas1.add(square);
            // canvas1.add(square1);  
            // canvas1.renderAll();

            if(total_data[$("#product_list option:selected").text()].texture_dark_flag == 1) {
                fabric.Image.fromURL('img/product1/'+$("#product_list option:selected").text()+"-texture-dark.png", function(img1) {
                    // console.log(img1);
                    

                        texture_dark_img = img1.set({ left: canvas1.width/2-mockup_img_width/2, top: canvas1.height/2-mockup_img_height/2, angle: 0, scaleX:image_size_scale, scaleY:image_size_scale, style:'opacity: 1;', selectable: false });
                        texture_dark_img.globalCompositeOperation = 'screen';
                        canvas1.add(texture_dark_img); 
                
                    if(total_data[$("#product_list option:selected").text()].texture_white_flag == 1) {
                        fabric.Image.fromURL('img/product1/'+$("#product_list option:selected").text()+"-texture-white.png", function(img2) {

                                texture_white_img = img2.set({ left: canvas1.width/2-mockup_img_width/2, top: canvas1.height/2-mockup_img_height/2, angle: 0, scaleX:image_size_scale, scaleY:image_size_scale, style:'opacity: 1;', selectable: false });
                                texture_white_img.globalCompositeOperation = 'multiply';
                                canvas1.add(texture_white_img);

                                checkurlandprocess(fff,ggg);
                            // canvas1.setActiveObject(texture_white_img);
                        });
                    } else {
                        checkurlandprocess(fff,ggg);
                    }
                });
            } if(total_data[$("#product_list option:selected").text()].texture_white_flag == 1) {
                fabric.Image.fromURL('img/product1/'+$("#product_list option:selected").text()+"-texture-white.png", function(img2) {

                        texture_white_img = img2.set({ left: canvas1.width/2-mockup_img_width/2, top: canvas1.height/2-mockup_img_height/2, angle: 0, scaleX:image_size_scale, scaleY:image_size_scale, style:'opacity: 1;', selectable: false });
                        texture_white_img.globalCompositeOperation = 'multiply';
                        canvas1.add(texture_white_img);

                        checkurlandprocess(fff,ggg);
                    // canvas1.setActiveObject(texture_white_img);
                });
            }
            else {
                checkurlandprocess(fff,ggg);
            }
            
            // 
            
        });
    });
    
}
function checkurlandprocess(fff,ggg){
    if(url_flag == true) {
        var url = 'upload1.php';
        var xhr = new XMLHttpRequest();
        var fd = new FormData();
        xhr.open("POST", url, true);
        xhr.onreadystatechange = function() {
            if(xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                
                fabric.Image.fromURL(xhr.responseText, function(img) {
                    canvas1.remove(pattern_img);
                    document.getElementById("c").style.maskImage = "";
                    document.getElementById("c").style.webkitMaskImage = "";
                    document.getElementById("c").classList.remove("mask-class");
                    pattern_img_width = img.width;
                    pattern_img_height = img.height;
                    var offset_x = -20;//parseInt(getURLParameter("x"));
                    var offset_y = -50;//parseInt(getURLParameter("y"));

                    var scale1 = parseInt(getURLParameter("w"))/img.width;
                    var scale2 = parseInt(getURLParameter("h"))/img.height;
                
                    if(getURLParameter("o")) {
                        total_data[$("#product_list option:selected").text()].opacity = getURLParameter("o");
                        pattern_img = img.set({ left: mockup_img.left + offset_x, top: mockup_img.top + offset_y, angle: 0, scaleX: scale1, scaleY: scale2, opacity: parseInt(getURLParameter("o"))/100});
                    } else {
                        pattern_img = img.set({ left: mockup_img.left + offset_x, top: mockup_img.top + offset_y, angle: 0, scaleX: scale1, scaleY: scale2, opacity: 0.7});
                    }
                    if(getURLParameter("bm")) {
                        total_data[$("#product_list option:selected").text()].blend_mode = getURLParameter("bm");
                        pattern_img.globalCompositeOperation = getURLParameter("bm");
                    } else {
                        pattern_img.globalCompositeOperation = 'multiply';
                    }
                    pattern_img['cornerStyle'] = 'circle';
                    pattern_img['hasRotatingPoint'] = false;
                    pattern_img['cornerSize'] = 7;
                    pattern_img['cornerColor'] = '#f96736';
                    pattern_img['borderColor'] = '#f96736';
                    canvas1.add(pattern_img);
                    canvas1.renderAll();
                    $(".loader1").hide();
                    $("#product_list").prop("disabled", false);
                    set_flag = true;
                    getProductImage();
                });
            }
        }
        fd.append("file_url", getURLParameter("url"));
        xhr.send(fd);

    } else {
        canvas1.renderAll();
        $(".loader1").hide();
        $("#product_list").prop("disabled", false);
        if(ggg==true)
            make_pattern_img();
        if(fff == true) {
            getProductImage();
        }
    } 
}
function getProductImage() {
    canvas1.remove(square1);
    canvas1.remove(square);
    canvas1.remove(shadow_img);
    canvas1.remove(pattern_img);
    
    if(pattern_img) {
        pattern_img.globalCompositeOperation = 'source-atop';
        // pattern_img.opacity = 0.7;
        canvas1.add(pattern_img);
        pattern_img.selectable = false;

        // canvas1.remove(mockup_img);
        // mockup_img.globalCompositeOperation = "multiply";
        // canvas1.add(mockup_img);
    }
    shadow_img.globalCompositeOperation = 'destination-over';
    
    canvas1.add(shadow_img);
    if(total_data[$("#product_list option:selected").text()].texture_dark_flag == 1) {
        // console.log(texture_dark_img);
        canvas1.remove(texture_dark_img);
        if(total_data[$("#product_list option:selected").text()].blend_mode == 'normal'){
            texture_dark_img.globalCompositeOperation = 'normal';
        
        } else {
            texture_dark_img.globalCompositeOperation = 'screen';
        }
   
        canvas1.add(texture_dark_img);
        // canvas1.bringToFront(texture_dark_img);
    }
    if(total_data[$("#product_list option:selected").text()].texture_white_flag == 1) {
        // console.log("SDFSDF111");
        canvas1.remove(texture_white_img);
        texture_white_img.globalCompositeOperation = 'multiply';
        canvas1.add(texture_white_img);
        // canvas1.bringToFront(texture_white_img);
    }
    canvas1.renderAll();
    
    set_flag = false;
    if(url_flag) {
        // $("#export-button").click();
    }
}

canvas1.on('mouse:down', function(e) { 
    // e.target should be the circle
    if((e.target == null) && (pattern_img) && (set_flag)) {
        getProductImage();
    }
    
    var xx= e.e.layerX;
    var yy = e.e.layerY;
    // console.log($("#product_name_label").val());
    if($("#product_name_label").val() != "Select Mockup") {
        if(total_data[$("#product_list option:selected").text()].perspective != 1) {
            if(xx > mockup_img.left && xx < mockup_img.left + mockup_img.width*mockup_img.scaleX && yy > mockup_img.top && yy < mockup_img.top + mockup_img.height*mockup_img.scaleY){
                
                if(pattern_img){
                    // canvas1.remove(square1);
                    // canvas1.remove(square);
                    // canvas1.add(square1);
                    // canvas1.add(square);
                    // document.getElementById("c").style.maskImage = "";
                    // document.getElementById("c").style.webkitMaskImage = "";
                    // document.getElementById("c").classList.remove("mask-class");
                    // canvas1.remove(pattern_img);
                    if(total_data[$("#product_list option:selected").text()].blend_mode)
                        pattern_img.globalCompositeOperation = total_data[$("#product_list option:selected").text()].blend_mode;
                    else
                        pattern_img.globalCompositeOperation = 'multiply';
                    // canvas1.add(pattern_img);
                    pattern_img.selectable = true;
                    canvas1.setActiveObject(pattern_img);
                    set_flag = true;
                }
            }
        }
    }
});

canvas1.on('object:scaling', function(){
    var obj = canvas1.getActiveObject();
});


var imageFoo = document.createElement('img');
var newImg = document.createElement('img');
$('#export-art-button').on('click', function () {
    
    if(downloads2 > 0 || token !="" ) {
        // console.log((pattern_img.getElement().src).split("img/")[1]);
        // console.log((document.getElementById("image").src).split("img/")[1]);
        $("#export-art-button").prop("disabled", true);
        if(total_data[$("#product_list option:selected").text()].perspective !=1 ) {
            

            $(".loader1").show();
            var original_width = art_width;//pattern_img.width;
            var original_height = art_height;//pattern_img.height;


            // var imagecanvas = document.createElement('canvas');
            // var imagecontext = imagecanvas.getContext('2d');

            // var mock_origin_width = mockup_img.width;
            // var mock_origin_height = mockup_img.height;

            // var mock1 = mockup_img.getElement();
            var pattern1 = pattern_img.getElement();

            var send_x,send_y, send_width, send_height;
            if(original_height == 0 ) {
                // imagecanvas.width  = pattern_img.width;
                // imagecanvas.height = pattern_img.height;
                // imagecontext.drawImage(pattern1, 0,0,pattern_img.width,pattern_img.height,0,0,pattern_img.width, pattern_img.height);
                send_x = 0;
                send_y = 0;
                send_width = pattern_img.width;
                send_height = pattern_img.height;
            } else {
                // imagecanvas.width  = original_width;
                // imagecanvas.height = original_height;
                // imagecontext.drawImage(pattern1,
                // (square.left-pattern_img.left) /pattern_img.scaleX , 
                // (square.top-pattern_img.top)/pattern_img.scaleY,
                // square.width/pattern_img.scaleX, 
                // square.height/pattern_img.scaleY,
                //  0,0,
                //  original_width, original_height);
                send_x = (square.left-pattern_img.left) /pattern_img.scaleX;
                send_y = (square.top-pattern_img.top)/pattern_img.scaleY;
                send_width = square.width/pattern_img.scaleX;
                send_height =  square.height/pattern_img.scaleY;
            }
            send_x = 0;
            send_y = 0;
            send_width = pattern_img.width;
            send_height = pattern_img.height;
            // console.log(send_x);
            // imagecanvas.toBlob(function(blob) {
                // $(".loader1").hide();
                // var _URL = window.URL || window.webkitURL;
                // var url = URL.createObjectURL(blob);
                // var download = document.createElement('a');
                // download.href = url;
                // download.download = 'product-art-file.png';
                // fireEvent(download, 'click')
                // URL.revokeObjectURL(url);
                
                var url = 'convert_resolution.php';
                var _URL = window.URL || window.webkitURL;
                var xhr = new XMLHttpRequest();
                var fd = new FormData();
                url_flag = false;
                xhr.open("POST", url, true);
                xhr.onreadystatechange = function() {
                    if(xhr.readyState == 4 && xhr.status == 200) {
                        console.log(xhr.responseText);
                        console.log(this_pattern_url);
                        $(".loader1").hide();
                        var url = xhr.responseText;
                        var download = document.createElement('a');
                        download.href = xhr.responseText;
                        // download.download = 'product-art-file.png';
                        // fireEvent(download, 'click');
                        if(extension_type == "image/png") {
                        
                            download.download = 'product-art-file.png';
                            fireEvent(download, 'click')
                            // URL.revokeObjectURL(url);                   
                
                        } else {

                            download.download = 'product-art-file.jpg';
                            fireEvent(download, 'click')
                            // URL.revokeObjectURL(url);
                        }
                    }
                }
                // fd.append("design_file", blob);
                console.log("send_x:"+send_x+",send_y:"+send_y+",send_width:"+send_width+",send_height"+send_height+",art_width:"+total_data[$("#product_list option:selected").text()].width+",art_height:"+total_data[$("#product_list option:selected").text()].height);
                fd.append("dpi", total_data[$("#product_list option:selected").text()].dpi);
                fd.append("send_x", send_x);
                fd.append("send_y", send_y);
                fd.append("send_width", send_width);
                fd.append("send_height", send_height);
                fd.append("src",(this_pattern_url).split("img/")[1]);
                fd.append("art_width", 0);
                fd.append("art_height", 0);
                xhr.send(fd);
                
            // });
                    
            
        } else {
            $(".loader1").show();
            var url = 'convert_resolution.php';
            var _URL = window.URL || window.webkitURL;
            var xhr = new XMLHttpRequest();
            var fd = new FormData();
            url_flag = false;
            xhr.open("POST", url, true);
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText);
                    console.log(this_pattern_url);
                    $(".loader1").hide();
                    var url = xhr.responseText;
                    var download = document.createElement('a');
                    download.href = url;
                    if(extension_type == "image/png") {
                        
                        download.download = 'product-art-file.png';
                        fireEvent(download, 'click')
                        // URL.revokeObjectURL(url);                   
            
                    } else {

                        download.download = 'product-art-file.jpg';
                        fireEvent(download, 'click')
                        // URL.revokeObjectURL(url);
                    }
                }
            }
            // fd.append("design_file", blob);
            console.log("send_x:"+data1.x+",send_y:"+data1.y+",send_width:"+data1.width+",send_height"+data1.height+",art_width:"+total_data[$("#product_list option:selected").text()].width+",art_height:"+total_data[$("#product_list option:selected").text()].height);
            
            fd.append("dpi", total_data[$("#product_list option:selected").text()].dpi);
            fd.append("send_x", data1.x);
            fd.append("send_y", data1.y);
            fd.append("send_width", data1.width);
            fd.append("send_height", data1.height);
            fd.append("src",(this_pattern_url).split("img/")[1]);
            fd.append("art_width", total_data[$("#product_list option:selected").text()].width);
            fd.append("art_height", total_data[$("#product_list option:selected").text()].height);
            xhr.send(fd);
            
        }
        if(downloads2 == 1 && token =="") 
            $("#download_modal_btn").click();
    } else {
        $("#download_error_modal_btn").click();    
    }
    downloads2--;
    download_update();
});
$("#moal_close").on('click', function () {

});

$('body').on('click', function (e) {
    $("#product_list").hide();
})
function uploadFile(file, file0) {
  var url = 'upload.php';
  var _URL = window.URL || window.webkitURL;
  var xhr = new XMLHttpRequest();
  var fd = new FormData();
  url_flag = false;
  xhr.open("POST", url, true);
  xhr.onreadystatechange = function() {
    if(xhr.readyState == 4 && xhr.status == 200) {
        console.log(xhr.responseText);
        this_pattern_url = xhr.responseText;
        console.log(downloads1);
        $("#product_list").prop("disabled", false);
        if(downloads1>=0)
            $("#export-button").prop("disabled", false);
        if(downloads2>=0)
            $("#export-art-button").prop("disabled", false);
        if(token != "") {
            $("#export-button").prop("disabled", false);
            $("#export-art-button").prop("disabled", false);
        }
        var reader = new FileReader();
        reader.onload = function(f) {
            var this_url = f.target.result;
            fabric.Image.fromURL(this_url, function(img) {
                canvas1.remove(pattern_img);
                document.getElementById("c").style.maskImage = "";
                document.getElementById("c").style.webkitMaskImage = "";
                document.getElementById("c").classList.remove("mask-class");
            
                if(total_data[$("#product_list option:selected").text()].perspective != "1") {
                    
                        pattern_img_width = img.width;
                        pattern_img_height = img.height;
            
                        if(total_data[$("#product_list option:selected").text()].opacity)
                            pattern_img = img.set({ left: mockup_img.left + 20, top: mockup_img.top + 50, angle: 0, scaleX: 150/img.width, scaleY: 150/img.width, opacity: parseInt(total_data[$("#product_list option:selected").text()].opacity)/100});
                        else
                            pattern_img = img.set({ left: mockup_img.left + 20, top: mockup_img.top + 50, angle: 0, scaleX: 150/img.width, scaleY: 150/img.width, opacity: 0.7});
                        if(total_data[$("#product_list option:selected").text()].blend_mode)
                            pattern_img.globalCompositeOperation = total_data[$("#product_list option:selected").text()].blend_mode;
                        else
                            pattern_img.globalCompositeOperation = 'multiply';
                        pattern_img['cornerStyle'] = 'circle';
                        pattern_img['hasRotatingPoint'] = false;
                        pattern_img['transparentCorners'] = false;
                        pattern_img['cornerSize'] = 7;
                        pattern_img['cornerColor'] = '#f96736';
                        pattern_img['borderColor'] = '#f96736';
                        canvas1.add(pattern_img);
                    
                        set_flag = true;
                        $(".loader1").hide();
                } else {
                    if(total_data[$("#product_list option:selected").text()].dtg !=1) {
                        init_this(this_url);
                     } else {
                        image_crop.src = this_url;
                     }
                }
            });
        }
        reader.readAsDataURL(file0);
    }
  }
  fd.append("design_file", file);
  fd.append("dpi", total_data[$("#product_list option:selected").text()].dpi);
  xhr.send(fd);
}

var readURL = function(input,file0) {
    $(".loader1").show();
    $("#product_list").prop("disabled", true);
    if (input.files && input.files[0]) {
        console.log(input.files[0].size/1024/1024);
        var file_size = input.files[0].size/1024/1024;
        if(file_size < 15) {
            var file, img;
            if ((file = input.files[0])) {
                extension_type = file.type;
                uploadFile(file, file0);
            }
        } else {
            $("#filesize_modal_btn").click();
            $(".loader1").hide();
        }
    } else {
        $(".loader1").hide();
    }
}

$(".file-upload").on('change', function(e){ 
    readURL(this,e.target.files[0]);
});

$("#upload-button").on('click', function() {
    $(".file-upload").click();
});
var imageFoo1 = document.createElement('img');
var newImg1 = document.createElement('img');
$("#export-button").on('click', function() {
    // var canvas1 = document.getElementById('c'),
    // dataUrl = canvas1.toDataURL(),
    if(downloads1 > 0 || token !="" ) {
        
        $(".loader1").show();
        $("#export-button").prop("disabled", true);
        var canvas1 = document.createElement('canvas');
        var this_canvas = canvas1.getContext('2d');
        
        dataUrl = canvas1.toDataURL();
        
        imageFoo1.src = dataUrl;
        
        // Style your image here

        var original_width = mockup_img.width;
        var original_height = (mockup_img.height);
        // imageFoo.style.width = canvas1.width + "px";
        // imageFoo.style.height = canvas1.height + "px";
        imageFoo1.style.width = original_width+"px";
        imageFoo1.style.height = original_height+"px";
        // imageFoo.dataset.mask = 'img/mask-image-big_1.png';
        imageFoo1.dataset.mask = 'img/product1/'+$("#product_list option:selected").text()+'-mask.png';

///////////////
        var imagecanvas = document.createElement('canvas');
        var imagecontext = imagecanvas.getContext('2d');

        /* uncomment do see the canvas to debug
        document.body.appendChild(imagecanvas);
        */
        // var logo = document.getElementById('c');

        // logo['data-mask'] = 'centerblur.png';
        var img = imageFoo1;
        
        
        newImg1.src = img.src;
        
        newImg1.onload = function() {
            var width  = newImg1.width;
            var height = newImg1.height;

            var mask = document.createElement('img');
            mask.src = img.getAttribute('data-mask');
            mask.width = original_width;
            mask.height = original_height;
        
            mask.onload = function() {
            imagecanvas.width  = original_width;//width;
            imagecanvas.height = original_height;
            // console.log(mockup_img);
            // console.log(pattern_img);
            // console.log(img);
            var original_rate_x = original_width / (mockup_img.width*mockup_img.scaleX);
            var original_rate_y = original_height / (mockup_img.height*mockup_img.scaleY);
            
            var shadow1 = shadow_img.getElement();
            var mock1 = mockup_img.getElement();
            var pattern1 = pattern_img.getElement();
            
            // 
            // 
            //
            
            imagecontext.drawImage(mock1, 0, 0 ,original_width,original_height);
            // if(total_data[$("#product_list option:selected").text()].blend_mode)
            //     imagecontext.globalCompositeOperation = total_data[$("#product_list option:selected").text()].blend_mode;
            // else
            //     imagecontext.globalCompositeOperation = 'multiply';
            imagecontext.globalCompositeOperation = 'normal';
        
            imagecontext.drawImage(pattern1, 0,0,pattern_img.width,pattern_img.height,-(mockup_img.left-pattern_img.left) * original_rate_x, -(mockup_img.top-pattern_img.top) *original_rate_y ,pattern_img.width*pattern_img.scaleX*original_rate_x,pattern_img.height*pattern_img.scaleY*original_rate_y);
            imagecontext.globalCompositeOperation = 'destination-atop';
            // imagecontext.drawImage(mask, width/2-150, height/2-150, 300,300);
            imagecontext.drawImage(mask, 0,0, original_width,original_height); //(mockup_img.left-pattern_img.left) * original_rate_x,  (mockup_img.top-pattern_img.top) *original_rate_y
            // imagecontext.drawImage(img, width/2-150, height/2-150,300,300,0,0,1500,1500);
            //img.src = imagecanvas.toDataURL('image/jpg');
            if(shadow1 != null) {
                imagecontext.globalCompositeOperation = 'destination-over';
                imagecontext.drawImage(shadow1, 0, 0 ,original_width,original_height);
            }
            

            // 
            if(total_data[$("#product_list option:selected").text()].texture_dark_flag == 1) 
            {
                var texture_dark = texture_dark_img.getElement();
                if(total_data[$("#product_list option:selected").text()].blend_mode == 'normal')
                    imagecontext.globalCompositeOperation = 'source-atop';
                else
                    imagecontext.globalCompositeOperation = 'screen';
                // imagecontext.globalCompositeOperation = 'source-atop';
                
                imagecontext.drawImage(texture_dark, 0, 0 ,original_width,original_height);
            }

            // 
            if(total_data[$("#product_list option:selected").text()].texture_white_flag == 1) {
                var texture_white = texture_white_img.getElement();
                imagecontext.globalCompositeOperation = 'multiply';
                imagecontext.drawImage(texture_white, 0, 0 ,original_width,original_height);
            }
            
            imagecontext.globalCompositeOperation = 'destination-over';
            
            imagecontext.fillStyle ="white";
            imagecontext.fillRect(0,0,original_width,original_height);
            
            $(".loader1").hide();
            imagecanvas.toBlob(function(blob) {
                var url = URL.createObjectURL(blob);
                var download = document.createElement('a');
                download.href = url;
                download.download = 'product.jpg';
                fireEvent(download, 'click')
                // URL.revokeObjectURL(url);
                
            },"image/jpeg",1);
            
            // document.getElementById("mockup-image").appendChild(img);
            
            }
        }     
        if(downloads1 == 1 && token=="") 
        {
            $("#download_modal_btn").click();
        }
        downloads1--;
    } else {
        downloads1--;
        $("#download_error_modal_btn").click();
    }
    download_update();
});
    // $("#export-art-button").on('click', function() {
    
    // });
    function fireEvent(obj,evt){
        var fireOnThis = obj;
        if(document.createEvent ) {
            var evObj = document.createEvent('MouseEvents');
            evObj.initEvent( evt, true, false );
            fireOnThis.dispatchEvent( evObj );
        } else if( document.createEventObject ) {
            var evObj = document.createEventObject();
            fireOnThis.fireEvent( 'on' + evt, evObj );
        }
    }
        
    // var imageElement = document.createElement('img');
    // imageElement.src = 'img/product1/'+$("#product_list option:selected").text()+'-mask.png';
    // var fImage = new fabric.Image(imageElement);
    // fImage.scaleX = 1;
    // fImage.scaleY = 1;
    // fImage.top = 15;
    // fImage.left = 15;
    
    function applyFilter(index, filter, obj) {  
        obj.filters.push(filter);
        obj.applyFilters();
        canvas1.renderAll();
    }
    function applyFilterValue(index, prop, value, obj) {
        if (obj.filters[index]) {
            obj.filters[index][prop] = value;
            obj.applyFilters();
            canvas1.renderAll();
        }
    }
// init_this();
    function init_this(url) {
        $(".loader1").hide();
        var image = document.getElementById("image");
        image.parentNode.innerHTML = `<img id="image" src="" alt="Picture" style="width:600px;">`;
        image = document.getElementById("image");
        


        var crop_width, crop_height;
        var img_ratio = document.getElementById("image").naturalWidth / document.getElementById("image").naturalHeight;
        // $(image).removeClass("cropper-hidden");
        var crop_tool_image;
        var crop_tool_scale
        resize_flag=1;
        
        // console.log(url);
        $("#crop_dimension").text("("+total_data[$("#product_list option:selected").text()].width+"px x "+total_data[$("#product_list option:selected").text()].height+"px)");
        $("#do_modal_crop").click();
        image.src = url;
        // console.log(image);
        image.onload = function() {
            setTimeout(function () {
            
                cropper = new Cropper(image, {
                dragMode: 'move',
                autoCropArea: 0,
                strict: false,
                restore: false,
                guides: false,
                center: false,
                highlight: false,
                cropBoxMovable: false,
                cropBoxResizable: false,
                toggleDragModeOnDblclick: false,
                ready: function() {
                    crop_tool_image = document.getElementsByClassName("cropper-canvas")[0];
                    crop_tool_scale = document.getElementById("image").naturalWidth / crop_tool_image.offsetWidth;
                    
                    var crop_width, crop_height;
                    if(document.getElementById("image").naturalWidth > art_width && document.getElementById("image").naturalHeight > art_height){
                        crop_width = art_width / crop_tool_scale;
                        crop_height = art_height / crop_tool_scale;
                    } else {
                        if(document.getElementById("image").naturalWidth/ art_width * art_height>document.getElementById("image").naturalHeight) {
                            
                            crop_height = document.getElementById("image").naturalHeight * 0.7 / crop_tool_scale;
                            crop_width = crop_height * art_width / art_height;
                        } else {
                            crop_width = document.getElementById("image").naturalWidth * 0.7 / crop_tool_scale;
                            crop_height = crop_width / art_width * art_height;
                        }
                    }
                    console.log("crop_width:"+crop_width+",crop_height:"+crop_height);
                    cropper.setCropBoxData({left:document.getElementsByClassName("cropper-wrap-box")[0].offsetWidth/2- crop_width/2, top:document.getElementsByClassName("cropper-wrap-box")[0].offsetHeight/2- crop_height/2, width: crop_width, height:crop_height});
                    
                    // var transform = crop_tool_image.style.transform;
                    // var translate;
                    // if(transform != "") {
                    //     translate = transform.split("translateX(");
                        
                    //     if(translate.length >1 ) {
                    //         translate_x = parseFloat(translate[1].split("px)")[0]);
                    //     } else {
                    //         translate_y = parseFloat(translate[0].split("translateY(")[1].split("px)")[0]);
                    //     }
                    //     console.log(translate_x);
                    //     console.log(translate_y);
                    // }
                },
                crop: function (e) {    
                    if(resize_flag == 1){
                        data1 = e.detail;
                        
                    }
                    console.log(data1);
                    // var cropper = this.cropper;
                    // var imageData = cropper.getImageData();
                    // var previewAspectRatio = data.width / data.height;

                    //   var previewImage = elem.getElementsByTagName('img').item(0);
                    //   var previewWidth = elem.offsetWidth;
                    //   var previewHeight = previewWidth / previewAspectRatio;
                    //   var imageScaledRatio = data.width / previewWidth;

                    //   elem.style.height = previewHeight + 'px';
                    //   previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                    //   previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                    //   previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                    //   previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';
                        // console.log(e);
                    }
                });
            },300);
            
        }

    }

    function init_canvas() {
        
        // c = document.createElement('canvas');
        // ctx=c.getContext("2d");
        // c.width = document.getElementById('mockup-image').offsetWidth;
        // c.height = window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75;
        // c.id = 'c';
        // document.getElementById('mockup-image').append(c);

        // canvas1 = new fabric.Canvas('c');
        // f = fabric.Image.filters;
        product_load(false, true);
        
    }

    function make_pattern_img() {//parseFloat(total_data[$("#product_list option:selected").text()].top_right_x
        var temp_image = document.createElement('img');
        temp_image.src = canvas_pattern.toDataURL();
        console.log(canvas_pattern.toDataURL());
        fabric.Image.fromURL(canvas_pattern.toDataURL(), function(img) {
            canvas1.remove(pattern_img);
            document.getElementById("c").style.maskImage = "";
            document.getElementById("c").style.webkitMaskImage = "";
            document.getElementById("c").classList.remove("mask-class");
            pattern_img_width = img.width;
            pattern_img_height = img.height;
            
            // console.log(img.width);
            var position_x,position_y, size_x, size_y;
            if(total_data[$("#product_list option:selected").text()].position_x=="")
                position_x = 20;
            else
                position_x = total_data[$("#product_list option:selected").text()].position_x
            if(total_data[$("#product_list option:selected").text()].position_y=="")
                position_y = 50;
            else
                position_y = total_data[$("#product_list option:selected").text()].position_y
            if(total_data[$("#product_list option:selected").text()].size_x=="")
                size_x = 150/img.width;
            else
                size_x = total_data[$("#product_list option:selected").text()].size_x / img.width
            if(total_data[$("#product_list option:selected").text()].size_y=="")
                size_y = 150/img.height;
            else
                size_y = total_data[$("#product_list option:selected").text()].size_y / img.height
            // console.log(total_data[$("#product_list option:selected").text()]);
            // console.log(position_x);
            // console.log(mockup_img.left + parseFloat(position_x));      
            if(total_data[$("#product_list option:selected").text()].opacity)
                pattern_img = img.set({ left: mockup_img.left + parseFloat(position_x), top: mockup_img.top + parseFloat(position_y), angle: 0, scaleX: parseFloat(size_x), scaleY: parseFloat(size_y), opacity: parseInt(total_data[$("#product_list option:selected").text()].opacity)/100});
            else
                pattern_img = img.set({ left: mockup_img.left + parseFloat(position_x), top: mockup_img.top + parseFloat(position_y), angle: 0, scaleX: parseFloat(size_x), scaleY: parseFloat(size_y), opacity: 0.7});
            if(total_data[$("#product_list option:selected").text()].blend_mode)
                pattern_img.globalCompositeOperation = total_data[$("#product_list option:selected").text()].blend_mode;
            else
                pattern_img.globalCompositeOperation = 'multiply';
            // console.log(pattern_img);
            pattern_img.selectable = false;
            pattern_img['cornerStyle'] = 'circle';
            pattern_img['hasRotatingPoint'] = false;
            pattern_img['transparentCorners'] = false;
            pattern_img['cornerSize'] = 7;
            pattern_img['cornerColor'] = '#f96736';
            pattern_img['borderColor'] = '#f96736';
            canvas1.add(pattern_img);
            getProductImage();
            set_flag = true;
            // canvas1.on('mouse:down', function(e) { 
            //     // e.target should be the circle
            //     if((e.target == null) && (pattern_img) && (set_flag)) {
            //         getProductImage();
            //     }
            //     var xx= e.e.layerX;
            //     var yy = e.e.layerY;
            //     if(xx > mockup_img.left && xx < mockup_img.left + mockup_img.width*mockup_img.scaleX && yy > mockup_img.top && yy < mockup_img.top + mockup_img.height*mockup_img.scaleY){

            //         if(pattern_img){
            //             canvas1.remove(square1);
            //             canvas1.remove(square);
            //             canvas1.add(square1);
            //             canvas1.add(square);
            //             // document.getElementById("c").style.maskImage = "";
            //             // document.getElementById("c").style.webkitMaskImage = "";
            //             // document.getElementById("c").classList.remove("mask-class");
            //             // canvas1.remove(pattern_img);
            //             if(total_data[$("#product_list option:selected").text()].blend_mode)
            //                 pattern_img.globalCompositeOperation = total_data[$("#product_list option:selected").text()].blend_mode;
            //             else
            //                 pattern_img.globalCompositeOperation = 'multiply';
            //             // canvas1.add(pattern_img);
            //             pattern_img.selectable = false;
            //             canvas1.setActiveObject(pattern_img);
            //             set_flag = true;
            //         }
            //     }
            // });

            // canvas1.on('object:scaling', function(){
            //     var obj = canvas1.getActiveObject();
            // });
        });
        
    }

        
var pp=0;
function init_crop_canvas() {

        // window.addEventListener('load', function() {
        init_canvas();

}
var temp_canvas= document.createElement('canvas');;

function process_crop_data() {  
    image_crop.src = temp_canvas.toDataURL();
}
var crop_mouseflag = 0;
function modal_mousedown() {
    crop_mouseflag = 0;
    // $("#crop_label").prop('value',"Crop (Click Once)");
}

function modal_mouseup() {
    crop_mouseflag = 0;
    $("#crop_label").prop('value',"Crop (Click Once)");
}
function crop_mousedown(){
    $("#crop_label").prop('value',"Uploading & Saving...");
    // this.stopPropagation();
    crop_mouseflag = 1;
}
function crop_mouseup(){
    // this.stopPropagation();
    if(crop_mouseflag ==1 ) {
        $("#crop_label").prop('value',"Uploading & Saving...");
        crop_mouseflag = 0;
    } else {
        $("#crop_label").prop('value',"Crop (Click Once)");
    }
}
function getCropData() {
    console.log(cropper);
    // e.innerHTML = "Uploading & Saving…";
    $("#crop_label").prop('value',"Uploading & Saving...");
    $("#crop_spinner").css("left", $("#crop_spinner")[0].parentNode.offsetWidth/2-40);
    $("#crop_spinner").css("top", $("#crop_spinner")[0].parentNode.offsetHeight/2-40);
    $("#crop_spinner").show();
    // process_crop_data(e);
    clip_left_x = Math.min(parseFloat(total_data[$("#product_list option:selected").text()].top_left_x),parseFloat(total_data[$("#product_list option:selected").text()].top_right_x),parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_x),parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_x));
    clip_left_y = Math.min(parseFloat(total_data[$("#product_list option:selected").text()].top_left_y),parseFloat(total_data[$("#product_list option:selected").text()].top_right_y),parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_y),parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_y));
    clip_right_x = Math.max(parseFloat(total_data[$("#product_list option:selected").text()].top_left_x),parseFloat(total_data[$("#product_list option:selected").text()].top_right_x),parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_x),parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_x));
    clip_right_y = Math.max(parseFloat(total_data[$("#product_list option:selected").text()].top_left_y),parseFloat(total_data[$("#product_list option:selected").text()].top_right_y),parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_y),parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_y));

    temp_canvas.width = total_data[$("#product_list option:selected").text()].width;
    temp_canvas.height = total_data[$("#product_list option:selected").text()].height;
    var ctx3=temp_canvas.getContext("2d");
    var template_img = document.getElementById("image");

    
    ctx3.drawImage(template_img,data1.x, data1.y, data1.width, data1.height,0,0,temp_canvas.width,temp_canvas.height);
    
    canvas_pattern.id = "SSSS";
    // document.body.append(temp_canvas);
    process_crop_data();
    
    // document.getElementById('mockup-image').append(canvas_pattern);
    // clip_left_x = Math.min(parseFloat(total_data[$("#product_list option:selected").text()].top_left_x),parseFloat(total_data[$("#product_list option:selected").text()].top_right_x),parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_x),parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_x));
    // clip_left_y = Math.min(parseFloat(total_data[$("#product_list option:selected").text()].top_left_y),parseFloat(total_data[$("#product_list option:selected").text()].top_right_y),parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_y),parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_y));
    // clip_right_x = Math.max(parseFloat(total_data[$("#product_list option:selected").text()].top_left_x),parseFloat(total_data[$("#product_list option:selected").text()].top_right_x),parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_x),parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_x));
    // clip_right_y = Math.max(parseFloat(total_data[$("#product_list option:selected").text()].top_left_y),parseFloat(total_data[$("#product_list option:selected").text()].top_right_y),parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_y),parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_y));
    // document.getElementById("mockup-image").innerHTML =`<img id="swan" src="`+temp_canvas.toDataURL()+`" class="demo114"  style="position: fixed;visibility: hidden;"/>
    // <canvas width="`+(total_data[$("#product_list option:selected").text()].width)+`" height="`+(total_data[$("#product_list option:selected").text()].height)+`" style="opacity: 0.5; left: 314px; top: 206px;display:none;" id="mycanvas"></canvas>`;
    //     c1 = document.getElementById('mycanvas');
    //     console.log(c1);
    //     // document.getElementById("swan").src = temp_canvas.toDataURL(); 
    //     var back_img = document.getElementById("swan");
    //     console.log(back_img);
    //     back_img.onload = function() {
    //         console.log("SDSDFfds");
            
            
    //     }
    
}
var image_crop = new Image();
image_crop.onload = function() {
    if(total_data[$("#product_list option:selected").text()].dtg ==1 ){
        clip_left_x = Math.min(parseFloat(total_data[$("#product_list option:selected").text()].top_left_x),parseFloat(total_data[$("#product_list option:selected").text()].top_right_x),parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_x),parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_x));
        clip_left_y = Math.min(parseFloat(total_data[$("#product_list option:selected").text()].top_left_y),parseFloat(total_data[$("#product_list option:selected").text()].top_right_y),parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_y),parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_y));
        clip_right_x = Math.max(parseFloat(total_data[$("#product_list option:selected").text()].top_left_x),parseFloat(total_data[$("#product_list option:selected").text()].top_right_x),parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_x),parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_x));
        clip_right_y = Math.max(parseFloat(total_data[$("#product_list option:selected").text()].top_left_y),parseFloat(total_data[$("#product_list option:selected").text()].top_right_y),parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_y),parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_y));
        data1 = {};
        data1.width = image_crop.naturalWidth;
        data1.height = image_crop.naturalHeight;
    }
    canvas_pattern.width = (clip_right_x - clip_left_x)*data1.width/400;
    if(total_data[$("#product_list option:selected").text()].cheight =="") 
        canvas_pattern.height = (clip_right_y - clip_left_y)*data1.height/400;
    else
        canvas_pattern.height = (clip_right_y - clip_left_y)*data1.height/parseFloat(total_data[$("#product_list option:selected").text()].cheight);
    var ctx_canvas = canvas_pattern.getContext("2d");
    var p = new Perspective(ctx_canvas, image_crop);
    p.draw([
            [(parseFloat(total_data[$("#product_list option:selected").text()].top_left_x)-clip_left_x)*data1.width/400, (parseFloat(total_data[$("#product_list option:selected").text()].top_left_y)-clip_left_y)*data1.height/parseFloat(total_data[$("#product_list option:selected").text()].cheight)],
            [(parseFloat(total_data[$("#product_list option:selected").text()].top_right_x)-clip_left_x)*data1.width/400, (parseFloat(total_data[$("#product_list option:selected").text()].top_right_y)-clip_left_y)*data1.height/parseFloat(total_data[$("#product_list option:selected").text()].cheight)],
            [(parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_x)-clip_left_x)*data1.width/400, (parseFloat(total_data[$("#product_list option:selected").text()].bottom_right_y)-clip_left_y)*data1.height/parseFloat(total_data[$("#product_list option:selected").text()].cheight)],
            [(parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_x)-clip_left_x)*data1.width/400, (parseFloat(total_data[$("#product_list option:selected").text()].bottom_left_y)-clip_left_y)*data1.height/parseFloat(total_data[$("#product_list option:selected").text()].cheight)]
    ]);
    
    $("#crop_label").prop('value',"Crop (Click Once)");
    // document.body.append(canvas_pattern);
    init_crop_canvas(canvas_pattern);
    $("#crop_spinner").hide();
    $("#modal_crop").modal("hide");
}