!function(e){"use strict";var r=[{x:-1893456e3,y:92228531},{x:-1577923200,y:106021568},{x:-1262304e3,y:123202660},{x:-946771200,y:132165129},{x:-631152e3,y:151325798},{x:-315619200,y:179323175},{x:0,y:203211926},{x:315532800,y:226545805},{x:631152e3,y:248709873},{x:946684800,y:281421906},{x:1262304e3,y:308745538}],t=new Rickshaw.Graph({element:document.querySelector("#chart"),series:[{color:e.constants.primary,data:r}]});new Rickshaw.Graph.Axis.Time({graph:t}),t.render();var a=new Rickshaw.Graph({element:document.querySelector("#chart2"),series:[{data:[{x:-1893456e3,y:92228531},{x:-1577923200,y:106021568},{x:-1262304e3,y:123202660},{x:-946771200,y:132165129},{x:-631152e3,y:151325798},{x:-315619200,y:179323175},{x:0,y:203211926},{x:315532800,y:226545805},{x:631152e3,y:248709873},{x:946684800,y:281421906},{x:1262304e3,y:308745538}],color:e.constants.danger}]});new Rickshaw.Graph.Axis.Time({graph:a}),new Rickshaw.Graph.Axis.Y({graph:a,orientation:"left",tickFormat:Rickshaw.Fixtures.Number.formatKMBT,element:document.getElementById("y_axis")}),a.render(),e(window).resize(function(){t.configure({width:e("#chart").parent().width()}),t.render(),a.configure({width:e("#chart2").parent().width()-40}),a.render()})}(jQuery);