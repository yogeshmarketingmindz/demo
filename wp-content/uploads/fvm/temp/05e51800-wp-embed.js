(function(d,a){var e=false,b=false;if(a.querySelector){if(d.addEventListener){e=true;}}d.wp=d.wp||{};if(!!d.wp.receiveEmbedMessage){return;}d.wp.receiveEmbedMessage=function(m){var h=m.data;if(!(h.secret||h.message||h.value)){return;}if(/[^a-zA-Z0-9]/.test(h.secret)){return;}var k=a.querySelectorAll('iframe[data-secret="'+h.secret+'"]'),l=a.querySelectorAll('blockquote[data-secret="'+h.secret+'"]'),j,f,o,g,n;for(j=0;j<l.length;j++){l[j].style.display="none";}for(j=0;j<k.length;j++){f=k[j];if(m.source!==f.contentWindow){continue;}f.removeAttribute("style");if("height"===h.message){o=parseInt(h.value,10);if(o>1000){o=1000;}else{if(~~o<200){o=200;}}f.height=o;}if("link"===h.message){g=a.createElement("a");n=a.createElement("a");g.href=f.getAttribute("src");n.href=h.value;if(n.host===g.host){if(a.activeElement===f){d.top.location.href=h.value;}}}}};function c(){if(b){return;}b=true;var m=-1!==navigator.appVersion.indexOf("MSIE 10"),l=!!navigator.userAgent.match(/Trident.*rv:11\./),k=a.querySelectorAll("iframe.wp-embedded-content"),h,g,j,f;for(g=0;g<k.length;g++){j=k[g];if(!j.getAttribute("data-secret")){f=Math.random().toString(36).substr(2,10);j.src+="#?secret="+f;j.setAttribute("data-secret",f);}if((m||l)){h=j.cloneNode(true);h.removeAttribute("security");j.parentNode.replaceChild(h,j);}}}if(e){d.addEventListener("message",d.wp.receiveEmbedMessage,false);a.addEventListener("DOMContentLoaded",c,false);d.addEventListener("load",c,false);}})(window,document);