function YooCopyShortcode(){var e=document.getElementById("YooCopyInput");e.select(),e.setSelectionRange(0,99999),document.execCommand("copy"),document.getElementById("myTooltip").innerHTML="Shortcode Copied !"}function YoobaroutFunc(){document.getElementById("myTooltip").innerHTML="Copy to clipboard"}!function(e){e(document).ready(function(){"use strict";e(function(){e(".yoobar_colors").wpColorPicker(),e(".yoobar_hx_colors").wpColorPicker()})}),function(e){"use strict";e("#yoo_display_option").select2(),e(".yoo_display_option").select2()}(jQuery)}(jQuery),jQuery(document).ready(function(e){if(void 0!==wp.media){var t=!0,n=wp.media.editor.send.attachment;e(".new-media").click(function(o){wp.media.editor.send.attachment;var i=e(this),a=i.attr("id").replace("_button","");return t=!0,wp.media.editor.send.attachment=function(o,i){if(!t)return n.apply(this,[o,i]);"url"==e("input#"+a).data("return")?e("input#"+a).val(i.url):e("input#"+a).val(i.id),e("div#preview"+a).css("background-image","url("+i.url+")")},wp.media.editor.open(i),!1}),e(".add_media").on("click",function(){t=!1}),e(".remove-media").on("click",function(){var t=e(this).parent();t.find('input[type="text"]').val(""),t.find("div").css("background-image","url()")})}}),jQuery(document).ready(function(e){if(void 0!==wp.media){var t=!0,n=wp.media.editor.send.attachment;e(".new-media").click(function(o){wp.media.editor.send.attachment;var i=e(this),a=i.attr("id").replace("_button","");return t=!0,wp.media.editor.send.attachment=function(o,i){if(!t)return n.apply(this,[o,i]);"url"==e("input#"+a).data("return")?e("input#"+a).val(i.url):e("input#"+a).val(i.id),e("div#preview"+a).css("background-image","url("+i.url+")")},wp.media.editor.open(i),!1}),e(".add_media").on("click",function(){t=!1}),e(".remove-media").on("click",function(){var t=e(this).parent();t.find('input[type="text"]').val(""),t.find("div").css("background-image","url()")})}}),function(e){e.fn.drags=function(t){if(""===(t=e.extend({handle:"",cursor:"move"},t)).handle)var n=this;else n=this.find(t.handle);return n.css("cursor",t.cursor).on("mousedown",function(n){if(""===t.handle)var o=e(this).addClass("draggable");else o=e(this).addClass("active-handle").parent().addClass("draggable");var i=o.css("z-index"),a=o.outerHeight(),r=o.outerWidth(),d=o.offset().top+a-n.pageY,c=o.offset().left+r-n.pageX;o.css("z-index",1e3).parents().on("mousemove",function(t){e(".draggable").offset({top:t.pageY+d-a,left:t.pageX+c-r}).on("mouseup",function(){e(this).removeClass("draggable").css("z-index",i)})}),n.preventDefault()}).on("mouseup",function(){""===t.handle?e(this).removeClass("draggable"):e(this).removeClass("active-handle").parent().removeClass("draggable")})},e("#prevdiv").drags(),e(".yoobar_colors_trasn").minicolors({opacity:!0,format:"rgb",swatches:["#fff","#000","#f00","#0f0","#00f","#ff0","rgba(0,0,255,0.5"]})}(jQuery);

		;(function($){

			


$("#yvideo-staticbar").videoPopup();
$("#yvideo-staticbar_1").videoPopup();
$("#yvideo-staticbar_2").videoPopup();
$("#yvideo-staticbar_3").videoPopup();
$("#yvideo-staticbar_4").videoPopup();
$("#yvideo-staticbar_5").videoPopup();
$("#yvideo-staticbar_6").videoPopup();
$("#yvideo-staticbar_7").videoPopup();
$("#yvideo-staticbar_8").videoPopup();
$("#yvideo-staticbar_9").videoPopup();
$("#yvideo-staticbar_10").videoPopup();
$("#yvideo-staticbar_11").videoPopup();
$("#yvideo-staticbar_12").videoPopup();
$("#yvideo-staticbar_13").videoPopup();




		})(jQuery);