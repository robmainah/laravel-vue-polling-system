import{d as r,l as p,g as u,a as n,u as h,w as d,F as m,o as f,Z as _,b as e,f as b,j as x,m as g,p as v,O as y}from"./app-CTAVDbhm.js";import{_ as w}from"./AuthenticatedLayout.vue_vue_type_script_setup_true_lang-B87tBASB.js";import"./ApplicationLogo-5tAiKRnE.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const C=e("h2",{class:"font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"},"Update Choice",-1),$={class:"w-full p-4"},k={class:"dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg py-6 px-4"},q={class:"grid"},U={class:"flex flex-col"},B=e("label",{for:"content",class:"text-sm font-medium mb-2 text-white"},"Content",-1),E={class:"flex mt-6"},V=["disabled"],j=r({__name:"Edit",props:{choice:{}},setup(c){const o=c,s=p({content:o.choice.content}),l=async i=>{(await v.put(`/questions/${o.choice.question.id}/choices/${i}`,s.value)).status===200&&y.get(`/questions/${o.choice.question.id}/choices`)};return(i,t)=>(f(),u(m,null,[n(h(_),{title:"Update Choice"}),n(w,null,{header:d(()=>[C]),default:d(()=>[e("div",$,[e("div",k,[e("form",{onSubmit:t[1]||(t[1]=b(a=>l(i.choice.id),["prevent"]))},[e("div",q,[e("div",U,[B,x(e("input",{id:"content","onUpdate:modelValue":t[0]||(t[0]=a=>s.value.content=a),type:"text",class:"bg-gray-100 rounded-lg",placeholder:"Enter content"},null,512),[[g,s.value.content]])]),e("div",E,[e("button",{type:"submit",class:"px-3 py-1 rounded bg-blue-500 opacity-80 hover:opacity-100 text-white disabled:cursor-not-allowed disabled:bg-success disabled:opacity-50",disabled:!s.value.content}," Update ",8,V)])])],32)])])]),_:1})],64))}});export{j as default};
