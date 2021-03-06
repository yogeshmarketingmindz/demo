/*!
 * The Final Countdown for jQuery v2.0.4 (http://hilios.github.io/jQuery.countdown/)
 * Copyright (c) 2014 Edson Hilios
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
(function(a){if(typeof define==="function"&&define.amd){define(["jquery"],a);}else{a(jQuery);}})(function(f){var h=100;var b=[],e=[];e.push(/^[0-9]*$/.source);e.push(/([0-9]{1,2}\/){2}[0-9]{4}( [0-9]{1,2}(:[0-9]{2}){2})?/.source);e.push(/[0-9]{4}([\/\-][0-9]{1,2}){2}( [0-9]{1,2}(:[0-9]{2}){2})?/.source);e=new RegExp(e.join("|"));function d(j){if(j instanceof Date){return j;}if(String(j).match(e)){if(String(j).match(/^[0-9]*$/)){j=Number(j);}if(String(j).match(/\-/)){j=String(j).replace(/\-/g,"/");}return new Date(j);}else{throw new Error("Couldn't cast `"+j+"` to a date object.");}}var c={Y:"years",m:"months",w:"weeks",d:"days",D:"totalDays",H:"hours",M:"minutes",S:"seconds"};function g(j){return function(s){var l=s.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi);if(l){for(var m=0,n=l.length;m<n;++m){var p=l[m].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/),o=new RegExp(p[0]),k=p[1]||"",q=p[3]||"",r=null;p=p[2];if(c.hasOwnProperty(p)){r=c[p];r=Number(j[r]);}if(r!==null){if(k==="!"){r=i(q,r);}if(k===""){if(r<10){r="0"+r.toString();}}s=s.replace(o,r.toString());}}}s=s.replace(/%%/,"%");return s;};}function i(m,l){var j="s",k="";if(m){m=m.replace(/(:|;|\s)/gi,"").split(/\,/);if(m.length===1){j=m[0];}else{k=m[0];j=m[1];}}if(Math.abs(l)===1){return k;}else{return j;}}var a=function(j,k,l){this.el=j;this.$el=f(j);this.interval=null;this.offset={};this.instanceNumber=b.length;b.push(this);this.$el.data("countdown-instance",this.instanceNumber);if(l){this.$el.on("update.countdown",l);this.$el.on("stoped.countdown",l);this.$el.on("finish.countdown",l);}this.setFinalDate(k);this.start();};f.extend(a.prototype,{start:function(){if(this.interval!==null){clearInterval(this.interval);}var j=this;this.update();this.interval=setInterval(function(){j.update.call(j);},h);},stop:function(){clearInterval(this.interval);this.interval=null;this.dispatchEvent("stoped");},pause:function(){this.stop.call(this);},resume:function(){this.start.call(this);},remove:function(){this.stop();b[this.instanceNumber]=null;delete this.$el.data().countdownInstance;},setFinalDate:function(j){this.finalDate=d(j);},update:function(){if(this.$el.closest("html").length===0){this.remove();return;}this.totalSecsLeft=this.finalDate.getTime()-new Date().getTime();this.totalSecsLeft=Math.ceil(this.totalSecsLeft/1000);this.totalSecsLeft=this.totalSecsLeft<0?0:this.totalSecsLeft;this.offset={seconds:this.totalSecsLeft%60,minutes:Math.floor(this.totalSecsLeft/60)%60,hours:Math.floor(this.totalSecsLeft/60/60)%24,days:Math.floor(this.totalSecsLeft/60/60/24)%7,totalDays:Math.floor(this.totalSecsLeft/60/60/24),weeks:Math.floor(this.totalSecsLeft/60/60/24/7),months:Math.floor(this.totalSecsLeft/60/60/24/30),years:Math.floor(this.totalSecsLeft/60/60/24/365)};if(this.totalSecsLeft===0){this.stop();this.dispatchEvent("finish");}else{this.dispatchEvent("update");}},dispatchEvent:function(j){var k=f.Event(j+".countdown");k.finalDate=this.finalDate;k.offset=f.extend({},this.offset);k.strftime=g(this.offset);this.$el.trigger(k);}});f.fn.countdown=function(){var j=Array.prototype.slice.call(arguments,0);return this.each(function(){var l=f(this).data("countdown-instance");if(l!==undefined){var k=b[l],m=j[0];if(a.prototype.hasOwnProperty(m)){k[m].apply(k,j.slice(1));}else{if(String(m).match(/^[$A-Z_][0-9A-Z_$]*$/i)===null){k.setFinalDate.call(k,m);k.start();}else{f.error("Method %s does not exist on jQuery.countdown".replace(/\%s/gi,m));}}}else{new a(this,j[0],j[1]);}});};});