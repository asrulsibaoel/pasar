!function(e){"use strict";var o="blueimp.github.io"===window.location.hostname?"//jquery-file-upload.appspot.com/":"server/php/";e("#fileupload").fileupload({url:o,dataType:"json",done:function(o,p){e.each(p.result.files,function(o,p){e("<p/>").text(p.name).appendTo("#files")})},progressall:function(o,p){var a=parseInt(p.loaded/p.total*100,10);e("#progress").attr("value",a)}}).prop("disabled",!e.support.fileInput).parent().addClass(e.support.fileInput?void 0:"disabled")}(jQuery);