if(typeof(jQuery)!="undefined"){if(typeof(jQuery.fn.hoverIntent)=="undefined"){!function(b){b.fn.hoverIntent=function(x,w,v){var u={interval:100,sensitivity:6,timeout:0};u="object"==typeof x?b.extend(u,x):b.isFunction(w)?b.extend(u,{over:x,out:w,selector:v}):b.extend(u,{over:x,out:x,selector:w});var t,s,r,q,p=function(c){t=c.pageX,s=c.pageY;},o=function(d,e){return e.hoverIntent_t=clearTimeout(e.hoverIntent_t),Math.sqrt((r-t)*(r-t)+(q-s)*(q-s))<u.sensitivity?(b(e).off("mousemove.hoverIntent",p),e.hoverIntent_s=!0,u.over.apply(e,[d])):(r=t,q=s,e.hoverIntent_t=setTimeout(function(){o(d,e);},u.interval),void 0);},n=function(d,c){return c.hoverIntent_t=clearTimeout(c.hoverIntent_t),c.hoverIntent_s=!1,u.out.apply(c,[d]);},a=function(e){var g=b.extend({},e),f=this;f.hoverIntent_t&&(f.hoverIntent_t=clearTimeout(f.hoverIntent_t)),"mouseenter"===e.type?(r=g.pageX,q=g.pageY,b(f).on("mousemove.hoverIntent",p),f.hoverIntent_s||(f.hoverIntent_t=setTimeout(function(){o(g,f);},u.interval))):(b(f).off("mousemove.hoverIntent",p),f.hoverIntent_s&&(f.hoverIntent_t=setTimeout(function(){n(g,f);},u.timeout)));};return this.on({"mouseenter.hoverIntent":a,"mouseleave.hoverIntent":a},u.selector);};}(jQuery);}jQuery(document).ready(function(e){var d=e("#wpadminbar"),c,a,b,f=false;c=function(g,j){var k=e(j),h=k.attr("tabindex");if(h){k.attr("tabindex","0").attr("tabindex",h);}};a=function(g){d.find("li.menupop").on("click.wp-mobile-hover",function(i){var h=e(this);if(h.parent().is("#wp-admin-bar-root-default")&&!h.hasClass("hover")){i.preventDefault();d.find("li.menupop.hover").removeClass("hover");h.addClass("hover");}else{if(!h.hasClass("hover")){i.stopPropagation();i.preventDefault();h.addClass("hover");}else{if(!e(i.target).closest("div").hasClass("ab-sub-wrapper")){i.stopPropagation();i.preventDefault();h.removeClass("hover");}}}if(g){e("li.menupop").off("click.wp-mobile-hover");f=false;}});};b=function(){var g=/Mobile\/.+Safari/.test(navigator.userAgent)?"touchstart":"click";e(document.body).on(g+".wp-mobile-hover",function(h){if(!e(h.target).closest("#wpadminbar").length){d.find("li.menupop.hover").removeClass("hover");}});};d.removeClass("nojq").removeClass("nojs");if("ontouchstart" in window){d.on("touchstart",function(){a(true);f=true;});b();}else{if(/IEMobile\/[1-9]/.test(navigator.userAgent)){a();b();}}d.find("li.menupop").hoverIntent({over:function(){if(f){return;}e(this).addClass("hover");},out:function(){if(f){return;}e(this).removeClass("hover");},timeout:180,sensitivity:7,interval:100});if(window.location.hash){window.scrollBy(0,-32);}e("#wp-admin-bar-get-shortlink").click(function(g){g.preventDefault();e(this).addClass("selected").children(".shortlink-input").blur(function(){e(this).parents("#wp-admin-bar-get-shortlink").removeClass("selected");}).focus().select();});e("#wpadminbar li.menupop > .ab-item").bind("keydown.adminbar",function(j){if(j.which!=13){return;}var i=e(j.target),h=i.closest(".ab-sub-wrapper"),g=i.parent().hasClass("hover");j.stopPropagation();j.preventDefault();if(!h.length){h=e("#wpadminbar .quicklinks");}h.find(".menupop").removeClass("hover");if(!g){i.parent().toggleClass("hover");}i.siblings(".ab-sub-wrapper").find(".ab-item").each(c);}).each(c);e("#wpadminbar .ab-item").bind("keydown.adminbar",function(h){if(h.which!=27){return;}var g=e(h.target);h.stopPropagation();h.preventDefault();g.closest(".hover").removeClass("hover").children(".ab-item").focus();g.siblings(".ab-sub-wrapper").find(".ab-item").each(c);});d.click(function(g){if(g.target.id!="wpadminbar"&&g.target.id!="wp-admin-bar-top-secondary"){return;}d.find("li.menupop.hover").removeClass("hover");e("html, body").animate({scrollTop:0},"fast");g.preventDefault();});e(".screen-reader-shortcut").keydown(function(h){var i,g;if(13!=h.which){return;}i=e(this).attr("href");g=navigator.userAgent.toLowerCase();if(g.indexOf("applewebkit")!=-1&&i&&i.charAt(0)=="#"){setTimeout(function(){e(i).focus();},100);}});e("#adminbar-search").on({focus:function(){e("#adminbarsearch").addClass("adminbar-focused");},blur:function(){e("#adminbarsearch").removeClass("adminbar-focused");}});if("sessionStorage" in window){e("#wp-admin-bar-logout a").click(function(){try{for(var g in sessionStorage){if(g.indexOf("wp-autosave-")!=-1){sessionStorage.removeItem(g);}}}catch(h){}});}if(navigator.userAgent&&document.body.className.indexOf("no-font-face")===-1&&/Android (1.0|1.1|1.5|1.6|2.0|2.1)|Nokia|Opera Mini|w(eb)?OSBrowser|webOS|UCWEB|Windows Phone OS 7|XBLWP7|ZuneWP7|MSIE 7/.test(navigator.userAgent)){document.body.className+=" no-font-face";}});}else{(function(j,l){var e=function(o,n,d){if(o.addEventListener){o.addEventListener(n,d,false);}else{if(o.attachEvent){o.attachEvent("on"+n,function(){return d.call(o,window.event);});}}},f,g=new RegExp("\\bhover\\b","g"),b=[],k=new RegExp("\\bselected\\b","g"),h=function(n){var d=b.length;while(d--){if(b[d]&&n==b[d][1]){return b[d][0];}}return false;},i=function(u){var o,d,r,n,q,s,v=[],p=0;while(u&&u!=f&&u!=j){if("LI"==u.nodeName.toUpperCase()){v[v.length]=u;d=h(u);if(d){clearTimeout(d);}u.className=u.className?(u.className.replace(g,"")+" hover"):"hover";n=u;}u=u.parentNode;}if(n&&n.parentNode){q=n.parentNode;if(q&&"UL"==q.nodeName.toUpperCase()){o=q.childNodes.length;while(o--){s=q.childNodes[o];if(s!=n){s.className=s.className?s.className.replace(k,""):"";}}}}o=b.length;while(o--){r=false;p=v.length;while(p--){if(v[p]==b[o][1]){r=true;}}if(!r){b[o][1].className=b[o][1].className?b[o][1].className.replace(g,""):"";}}},m=function(d){while(d&&d!=f&&d!=j){if("LI"==d.nodeName.toUpperCase()){(function(n){var o=setTimeout(function(){n.className=n.className?n.className.replace(g,""):"";},500);b[b.length]=[o,n];})(d);}d=d.parentNode;}},c=function(q){var o,d,p,n=q.target||q.srcElement;while(true){if(!n||n==j||n==f){return;}if(n.id&&n.id=="wp-admin-bar-get-shortlink"){break;}n=n.parentNode;}if(q.preventDefault){q.preventDefault();}q.returnValue=false;if(-1==n.className.indexOf("selected")){n.className+=" selected";}for(o=0,d=n.childNodes.length;o<d;o++){p=n.childNodes[o];if(p.className&&-1!=p.className.indexOf("shortlink-input")){p.focus();p.select();p.onblur=function(){n.className=n.className?n.className.replace(k,""):"";};break;}}return false;},a=function(n){var s,q,p,d,r,o;if(n.id!="wpadminbar"&&n.id!="wp-admin-bar-top-secondary"){return;}s=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0;if(s<1){return;}o=s>800?130:100;q=Math.min(12,Math.round(s/o));p=s>800?Math.round(s/30):Math.round(s/20);d=[];r=0;while(s){s-=p;if(s<0){s=0;}d.push(s);setTimeout(function(){window.scrollTo(0,d.shift());},r*q);r++;}};e(l,"load",function(){f=j.getElementById("wpadminbar");if(j.body&&f){j.body.appendChild(f);if(f.className){f.className=f.className.replace(/nojs/,"");}e(f,"mouseover",function(d){i(d.target||d.srcElement);});e(f,"mouseout",function(d){m(d.target||d.srcElement);});e(f,"click",c);e(f,"click",function(d){a(d.target||d.srcElement);});e(document.getElementById("wp-admin-bar-logout"),"click",function(){if("sessionStorage" in window){try{for(var d in sessionStorage){if(d.indexOf("wp-autosave-")!=-1){sessionStorage.removeItem(d);}}}catch(n){}}});}if(l.location.hash){l.scrollBy(0,-32);}if(navigator.userAgent&&document.body.className.indexOf("no-font-face")===-1&&/Android (1.0|1.1|1.5|1.6|2.0|2.1)|Nokia|Opera Mini|w(eb)?OSBrowser|webOS|UCWEB|Windows Phone OS 7|XBLWP7|ZuneWP7|MSIE 7/.test(navigator.userAgent)){document.body.className+=" no-font-face";}});})(document,window);}