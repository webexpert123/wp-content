(self.webpackChunkwebpackWcBlocksMainJsonp=self.webpackChunkwebpackWcBlocksMainJsonp||[]).push([[345],{2686:(o,t,e)=>{"use strict";e.r(t),e.d(t,{Block:()=>a,default:()=>u});var c=e(1609),n=e(7723),l=e(851),s=e(2796),r=e(3566),i=e(1616);e(9644);const a=o=>{const{className:t}=o,e=(0,r.p)(o),{parentClassName:i}=(0,s.useInnerBlockLayoutContext)(),{product:a}=(0,s.useProductDataContext)();if(!a.id)return null;const u=!!a.is_in_stock,d=a.low_stock_remaining,k=a.is_on_backorder;return(0,c.createElement)("div",{className:(0,l.A)(t,{[`${i}__stock-indicator`]:i,"wc-block-components-product-stock-indicator--in-stock":u,"wc-block-components-product-stock-indicator--out-of-stock":!u,"wc-block-components-product-stock-indicator--low-stock":!!d,"wc-block-components-product-stock-indicator--available-on-backorder":!!k,...o.isDescendantOfAllProducts&&{[e.className]:e.className,"wc-block-components-product-stock-indicator wp-block-woocommerce-product-stock-indicator":!0}}),...o.isDescendantOfAllProducts&&{style:e.style}},(({isInStock:o=!1,isLowStock:t=!1,lowStockAmount:e=null,isOnBackorder:c=!1})=>t&&null!==e?(0,n.sprintf)(/* translators: %d stock amount (number of items in stock for product) */ /* translators: %d stock amount (number of items in stock for product) */
(0,n.__)("%d left in stock","woocommerce"),e):c?(0,n.__)("Available on backorder","woocommerce"):o?(0,n.__)("In stock","woocommerce"):(0,n.__)("Out of stock","woocommerce"))({isInStock:u,isLowStock:!!d,lowStockAmount:d,isOnBackorder:k}))},u=(0,i.withProductDataContext)(a)},3566:(o,t,e)=>{"use strict";e.d(t,{p:()=>r});var c=e(851),n=e(3993),l=e(92),s=e(6032);const r=o=>{const t=(o=>{const t=(0,n.isObject)(o)?o:{style:{}};let e=t.style;return(0,n.isString)(e)&&(e=JSON.parse(e)||{}),(0,n.isObject)(e)||(e={}),{...t,style:e}})(o),e=(0,s.BK)(t),r=(0,s.aR)(t),i=(0,s.fo)(t),a=(0,l.x)(t);return{className:(0,c.A)(a.className,e.className,r.className,i.className),style:{...a.style,...e.style,...r.style,...i.style}}}},92:(o,t,e)=>{"use strict";e.d(t,{x:()=>n});var c=e(3993);const n=o=>{const t=(0,c.isObject)(o.style.typography)?o.style.typography:{},e=(0,c.isString)(t.fontFamily)?t.fontFamily:"";return{className:o.fontFamily?`has-${o.fontFamily}-font-family`:e,style:{fontSize:o.fontSize?`var(--wp--preset--font-size--${o.fontSize})`:t.fontSize,fontStyle:t.fontStyle,fontWeight:t.fontWeight,letterSpacing:t.letterSpacing,lineHeight:t.lineHeight,textDecoration:t.textDecoration,textTransform:t.textTransform}}}},6032:(o,t,e)=>{"use strict";e.d(t,{BK:()=>a,aR:()=>u,fo:()=>d});var c=e(851),n=e(1194),l=e(9786),s=e(3993);function r(o={}){const t={};return(0,l.getCSSRules)(o,{selector:""}).forEach((o=>{t[o.key]=o.value})),t}function i(o,t){return o&&t?`has-${(0,n.c)(t)}-${o}`:""}function a(o){var t,e,n,l,a,u,d;const{backgroundColor:k,textColor:m,gradient:f,style:p}=o,v=i("background-color",k),y=i("color",m),b=function(o){if(o)return`has-${o}-gradient-background`}(f),g=b||(null==p||null===(t=p.color)||void 0===t?void 0:t.gradient);return{className:(0,c.A)(y,b,{[v]:!g&&!!v,"has-text-color":m||(null==p||null===(e=p.color)||void 0===e?void 0:e.text),"has-background":k||(null==p||null===(n=p.color)||void 0===n?void 0:n.background)||f||(null==p||null===(l=p.color)||void 0===l?void 0:l.gradient),"has-link-color":(0,s.isObject)(null==p||null===(a=p.elements)||void 0===a?void 0:a.link)?null==p||null===(u=p.elements)||void 0===u||null===(d=u.link)||void 0===d?void 0:d.color:void 0}),style:r({color:(null==p?void 0:p.color)||{}})}}function u(o){var t;const e=(null===(t=o.style)||void 0===t?void 0:t.border)||{};return{className:function(o){var t;const{borderColor:e,style:n}=o,l=e?i("border-color",e):"";return(0,c.A)({"has-border-color":!!e||!(null==n||null===(t=n.border)||void 0===t||!t.color),[l]:!!l})}(o),style:r({border:e})}}function d(o){var t;return{className:void 0,style:r({spacing:(null===(t=o.style)||void 0===t?void 0:t.spacing)||{}})}}},9644:()=>{}}]);