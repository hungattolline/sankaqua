/*! Slider Revolution 7.0 - Page Processor */
!function(){"use strict";window.SR7??={},window._tpt??={},SR7.version="Slider Revolution 6.7.9",_tpt.getWinDim=function(t){_tpt.screenHeightWithUrlBar??=window.innerHeight;let e=SR7.F?.modal?.visible&&SR7.M[SR7.F.module.getIdByAlias(SR7.F.modal.requested)];_tpt.scrollBar=window.innerWidth!==document.documentElement.clientWidth||e&&window.innerWidth!==e.c.module.clientWidth,_tpt.winW=window.innerWidth-(_tpt.scrollBar||"prepare"==t?_tpt.scrollBarW:0),_tpt.winH=window.innerHeight,_tpt.winWAll=e?e.c.module.clientWidth:document.documentElement.clientWidth},_tpt.getResponsiveLevel=function(t,e){SR7.M[e];let s=_tpt.closestGE(t,_tpt.winWAll),n=s;return Math.max(s,n)},_tpt.mesureScrollBar=function(){let t=document.createElement("div");t.className="RSscrollbar-measure",t.style.width="100px",t.style.height="100px",t.style.overflow="scroll",t.style.position="absolute",t.style.top="-9999px",document.body.appendChild(t),_tpt.scrollBarW=t.offsetWidth-t.clientWidth,document.body.removeChild(t)},_tpt.loadCSS=async function(t,e,s){return s?_tpt.R.fonts.required[e].status=1:(_tpt.R[e]??={},_tpt.R[e].status=1),new Promise(((n,i)=>{if(_tpt.isStylesheetLoaded(t))s?_tpt.R.fonts.required[e].status=2:_tpt.R[e].status=2,n();else{const o=document.createElement("link");o.rel="stylesheet";let l="text",r="css";o["type"]=l+"/"+r,o.href=t,o.onload=()=>{s?_tpt.R.fonts.required[e].status=2:_tpt.R[e].status=2,n()},o.onerror=()=>{s?_tpt.R.fonts.required[e].status=3:_tpt.R[e].status=3,i(new Error(`Failed to load CSS: ${t}`))},document.head.appendChild(o)}}))},_tpt.addContainer=function(t){const{tag:e="div",id:s,class:n,datas:i,textContent:o,iHTML:l}=t,r=document.createElement(e);if(s&&""!==s&&(r.id=s),n&&""!==n&&(r.className=n),i)for(const[t,e]of Object.entries(i))"style"==t?r.style.cssText=e:r.setAttribute(`data-${t}`,e);return o&&(r.textContent=o),l&&(r.innerHTML=l),r},_tpt.collector=function(){return{fragment:new DocumentFragment,add(t){var e=_tpt.addContainer(t);return this.fragment.appendChild(e),e},append(t){t.appendChild(this.fragment)}}},_tpt.isStylesheetLoaded=function(t){let e=t.split("?")[0];return Array.from(document.querySelectorAll('link[rel="stylesheet"], link[rel="preload"]')).some((t=>t.href.split("?")[0]===e))},_tpt.preloader={requests:new Map,preloaderTemplates:new Map,show:function(t,e){if(!e||!t)return;const{type:s,color:n}=e;if(s<0||"off"==s)return;const i=`preloader_${s}`;let o=this.preloaderTemplates.get(i);o||(o=this.build(s,n),this.preloaderTemplates.set(i,o)),this.requests.has(t)||this.requests.set(t,{count:0});const l=this.requests.get(t);clearTimeout(l.timer),l.count++,1===l.count&&(l.timer=setTimeout((()=>{l.preloaderClone=o.cloneNode(!0),l.anim&&l.anim.kill(),void 0!==_tpt.gsap?l.anim=_tpt.gsap.fromTo(l.preloaderClone,1,{opacity:0},{opacity:1}):l.preloaderClone.classList.add("sr7-fade-in"),t.appendChild(l.preloaderClone)}),150))},hide:function(t){if(!this.requests.has(t))return;const e=this.requests.get(t);e.count--,e.count<0&&(e.count=0),e.anim&&e.anim.kill(),0===e.count&&(clearTimeout(e.timer),e.preloaderClone&&(e.preloaderClone.classList.remove("sr7-fade-in"),e.anim=_tpt.gsap.to(e.preloaderClone,.3,{opacity:0,onComplete:function(){e.preloaderClone.remove()}})))},state:function(t){if(!this.requests.has(t))return!1;return this.requests.get(t).count>0},build:(t,e="#ffffff",s="")=>{if(t<0||"off"===t)return null;const n=parseInt(t);if(t="prlt"+n,isNaN(n))return null;if(_tpt.loadCSS(SR7.E.plugin_url+"public/css/preloaders/t"+n+".css","preloader_"+t),isNaN(n)||n<6){const i=`background-color:${e}`,o=1===n||2==n?i:"",l=3===n||4==n?i:"",r=_tpt.collector();["dot1","dot2","bounce1","bounce2","bounce3"].forEach((t=>r.add({tag:"div",class:t,datas:{style:l}})));const d=_tpt.addContainer({tag:"sr7-prl",class:`${t} ${s}`,datas:{style:o}});return r.append(d),d}{let i={};if(7===n){let t;e.startsWith("#")?(t=e.replace("#",""),t=`rgba(${parseInt(t.substring(0,2),16)}, ${parseInt(t.substring(2,4),16)}, ${parseInt(t.substring(4,6),16)}, `):e.startsWith("rgb")&&(t=e.slice(e.indexOf("(")+1,e.lastIndexOf(")")).split(",").map((t=>t.trim())),t=`rgba(${t[0]}, ${t[1]}, ${t[2]}, `),t&&(i.style=`border-top-color: ${t}0.65); border-bottom-color: ${t}0.15); border-left-color: ${t}0.65); border-right-color: ${t}0.15)`)}else 12===n&&(i.style=`background:${e}`);const o=[10,0,4,2,5,9,0,4,4,2][n-6],l=_tpt.collector(),r=l.add({tag:"div",class:"sr7-prl-inner",datas:i});Array.from({length:o}).forEach((()=>r.appendChild(l.add({tag:"span",datas:{style:`background:${e}`}}))));const d=_tpt.addContainer({tag:"sr7-prl",class:`${t} ${s}`});return l.append(d),d}}},SR7.preLoader={show:(t,e)=>{"off"!==(SR7.M[t]?.settings?.pLoader?.type??"off")&&_tpt.preloader.show(e||SR7.M[t].c.module,SR7.M[t]?.settings?.pLoader??{color:"#fff",type:10})},hide:(t,e)=>{"off"!==(SR7.M[t]?.settings?.pLoader?.type??"off")&&_tpt.preloader.hide(e||SR7.M[t].c.module)},state:(t,e)=>_tpt.preloader.state(e||SR7.M[t].c.module)},_tpt.prepareModuleHeight=function(t){window.SR7.M??={},window.SR7.M[t.id]??={},"ignore"==t.googleFont&&(SR7.E.ignoreGoogleFont=!0);let e=window.SR7.M[t.id];if(null==_tpt.scrollBarW&&_tpt.mesureScrollBar(),e.c??={},e.states??={},e.settings??={},e.settings.size??={},t.fixed&&(e.settings.fixed=!0),e.c.module=document.getElementById(t.id),e.c.adjuster=e.c.module.getElementsByTagName("sr7-adjuster")[0],e.c.content=e.c.module.getElementsByTagName("sr7-content")[0],"carousel"==t.type&&(e.c.carousel=e.c.content.getElementsByTagName("sr7-carousel")[0]),null==e.c.module||null==e.c.module)return;t.plType&&t.plColor&&(e.settings.pLoader={type:t.plType,color:t.plColor}),void 0!==t.plType&&"off"!==t.plType&&SR7.preLoader.show(t.id,e.c.module),_tpt.winW||_tpt.getWinDim("prepare"),_tpt.getWinDim();let s=""+e.c.module.dataset?.modal;"modal"==s||"true"==s||"undefined"!==s&&"false"!==s||(e.settings.size.fullWidth=t.size.fullWidth,e.LEV??=_tpt.getResponsiveLevel(window.SR7.G.breakPoints,t.id),t.vpt=_tpt.fillArray(t.vpt,5),e.settings.vPort=t.vpt[e.LEV],void 0!==t.el&&"720"==t.el[4]&&t.gh[4]!==t.el[4]&&"960"==t.el[3]&&t.gh[3]!==t.el[3]&&"768"==t.el[2]&&t.gh[2]!==t.el[2]&&delete t.el,e.settings.size.height=null==t.el||null==t.el[e.LEV]||0==t.el[e.LEV]||"auto"==t.el[e.LEV]?_tpt.fillArray(t.gh,5,-1):_tpt.fillArray(t.el,5,-1),e.settings.size.width=_tpt.fillArray(t.gw,5,-1),e.settings.size.minHeight=_tpt.fillArray(t.mh??[0],5,-1),e.cacheSize={fullWidth:e.settings.size?.fullWidth,fullHeight:e.settings.size?.fullHeight},void 0!==t.off&&(t.off?.t&&(e.settings.size.m??={})&&(e.settings.size.m.t=t.off.t),t.off?.b&&(e.settings.size.m??={})&&(e.settings.size.m.b=t.off.b),t.off?.l&&(e.settings.size.p??={})&&(e.settings.size.p.l=t.off.l),t.off?.r&&(e.settings.size.p??={})&&(e.settings.size.p.r=t.off.r)),_tpt.updatePMHeight(t.id,t,!0))},_tpt.updatePMHeight=(t,e,s)=>{let n=SR7.M[t];var i=n.settings.size.fullWidth?_tpt.winW:n.c.module.parentNode.offsetWidth;i=0===i||isNaN(i)?_tpt.winW:i;let o=n.settings.size.width[n.LEV]||n.settings.size.width[n.LEV++]||n.settings.size.width[n.LEV--]||i,l=n.settings.size.height[n.LEV]||n.settings.size.height[n.LEV++]||n.settings.size.height[n.LEV--]||0,r=n.settings.size.minHeight[n.LEV]||n.settings.size.minHeight[n.LEV++]||n.settings.size.minHeight[n.LEV--]||0;if(l="auto"==l?0:l,l=parseInt(l),"carousel"!==e.type&&(i-=parseInt(e.onw??0)||0),n.MP=!n.settings.size.fullWidth&&i<o||_tpt.winW<o?Math.min(1,i/o):1,e.size.fullScreen||e.size.fullHeight){let t=parseInt(e.fho)||0,s=(""+e.fho).indexOf("%")>-1;e.newh=_tpt.winH-(s?_tpt.winH*t/100:t)}else e.newh=n.MP*Math.max(l,r);if(e.newh+=(parseInt(e.onh??0)||0)+(parseInt(e.carousel?.pt)||0)+(parseInt(e.carousel?.pb)||0),void 0!==e.slideduration&&(e.newh=Math.max(e.newh,parseInt(e.slideduration)/3)),e.shdw&&_tpt.buildShadow(e.id,e),n.c.adjuster.style.height=e.newh+"px",n.c.module.style.height=e.newh+"px",n.c.content.style.height=e.newh+"px",n.states.heightPrepared=!0,n.dims??={},n.dims.moduleRect=n.c.module.getBoundingClientRect(),n.c.content.style.left="-"+n.dims.moduleRect.left+"px",!n.settings.size.fullWidth)return s&&requestAnimationFrame((()=>{i!==n.c.module.parentNode.offsetWidth&&_tpt.updatePMHeight(e.id,e)})),void _tpt.bgStyle(e.id,e,window.innerWidth==_tpt.winW,!0);_tpt.bgStyle(e.id,e,window.innerWidth==_tpt.winW,!0),requestAnimationFrame((function(){s&&requestAnimationFrame((()=>{i!==n.c.module.parentNode.offsetWidth&&_tpt.updatePMHeight(e.id,e)}))})),n.earlyResizerFunction||(n.earlyResizerFunction=function(){requestAnimationFrame((function(){_tpt.moduleDefaults(e.id,e),_tpt.updateSlideBg(t,!0)}))},window.addEventListener("resize",n.earlyResizerFunction))},_tpt.buildShadow=function(t,e){let s=SR7.M[t];null==s.c.shadow&&(s.c.shadow=document.createElement("sr7-module-shadow"),s.c.shadow.classList.add("sr7-shdw-"+e.shdw),s.c.content.appendChild(s.c.shadow))},_tpt.bgStyle=async(t,e,s,n,i)=>{const o=SR7.M[t];if((e=e??o.settings).fixed&&!o.c.module.classList.contains("sr7-top-fixed")&&(o.c.module.classList.add("sr7-top-fixed"),o.c.module.style.position="fixed",o.c.module.style.width="100%",o.c.module.style.top="0px",o.c.module.style.left="0px",o.c.module.style.pointerEvents="none",o.c.module.style.zIndex=5e3,o.c.content.style.pointerEvents="none"),null==o.c.bgcanvas){let t=document.createElement("sr7-module-bg"),l=!1;if("string"==typeof e?.bg?.color&&e?.bg?.color.includes("{"))if(_tpt.gradient&&_tpt.gsap)e.bg.color=_tpt.gradient.convert(e.bg.color);else try{let t=JSON.parse(e.bg.color);(t?.orig||t?.string)&&(e.bg.color=JSON.parse(e.bg.color))}catch(t){return}let r="string"==typeof e?.bg?.color?e?.bg?.color||"transparent":e?.bg?.color?.string??e?.bg?.color?.orig??e?.bg?.color?.color??"transparent";if(t.style["background"+(String(r).includes("grad")?"":"Color")]=r,("transparent"!==r||i)&&(l=!0),e?.bg?.image?.src&&(t.style.backgroundImage=`url(${e?.bg?.image.src})`,t.style.backgroundSize=""==(e.bg.image?.size??"")?"cover":e.bg.image.size,t.style.backgroundPosition=e.bg.image.position,t.style.backgroundRepeat=e.bg.image.repeat,l=!0),!l)return;o.c.bgcanvas=t,e.size.fullWidth?t.style.width=_tpt.winW-(s&&_tpt.winH<document.body.offsetHeight?_tpt.scrollBarW:0)+"px":n&&(t.style.width=o.c.module.offsetWidth+"px"),e.sbt?.use?o.c.content.appendChild(o.c.bgcanvas):o.c.module.appendChild(o.c.bgcanvas)}o.c.bgcanvas.style.height=void 0!==e.newh?e.newh+"px":("carousel"==e.type?o.dims.module.h:o.dims.content.h)+"px",o.c.bgcanvas.style.left=!s&&e.sbt?.use||o.c.bgcanvas.closest("SR7-CONTENT")?"0px":"-"+(o?.dims?.moduleRect?.left??0)+"px"},_tpt.updateSlideBg=function(t,e){const s=SR7.M[t];let n=s.settings;s?.c?.bgcanvas&&(n.size.fullWidth?s.c.bgcanvas.style.width=_tpt.winW-(e&&_tpt.winH<document.body.offsetHeight?_tpt.scrollBarW:0)+"px":preparing&&(s.c.bgcanvas.style.width=s.c.module.offsetWidth+"px"))},_tpt.moduleDefaults=(t,e)=>{let s=SR7.M[t];null!=s&&null!=s.c&&null!=s.c.module&&(s.dims??={},s.dims.moduleRect=s.c.module.getBoundingClientRect(),s.c.content.style.left="-"+s.dims.moduleRect.left+"px",s.c.content.style.width=_tpt.winW-_tpt.scrollBarW+"px","carousel"==e.type&&(s.c.module.style.overflow="visible"),_tpt.bgStyle(t,e,window.innerWidth==_tpt.winW))},_tpt.getOffset=t=>{var e=t.getBoundingClientRect(),s=window.pageXOffset||document.documentElement.scrollLeft,n=window.pageYOffset||document.documentElement.scrollTop;return{top:e.top+n,left:e.left+s}},_tpt.fillArray=function(t,e){let s,n;t=Array.isArray(t)?t:[t];let i=Array(e),o=t.length;for(n=0;n<t.length;n++)i[n+(e-o)]=t[n],null==s&&"#"!==t[n]&&(s=t[n]);for(let t=0;t<e;t++)void 0!==i[t]&&"#"!=i[t]||(i[t]=s),s=i[t];return i},_tpt.closestGE=function(t,e){let s=Number.MAX_VALUE,n=-1;for(let i=0;i<t.length;i++)t[i]-1>=e&&t[i]-1-e<s&&(s=t[i]-1-e,n=i);return++n}}();