import{d as r,l as u,g as p,a,u as m,w as n,F as h,o as _,Z as f,b as e,f as x,j as b,m as g,p as v,O as w}from"./app-CTAVDbhm.js";import{_ as y}from"./AuthenticatedLayout.vue_vue_type_script_setup_true_lang-B87tBASB.js";import"./ApplicationLogo-5tAiKRnE.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const C=e("h2",{class:"font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"},"Create New Choice",-1),q={class:"w-full p-4"},k={class:"dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg py-6 px-4"},N={class:"grid"},B={class:"flex flex-col"},D=e("label",{for:"content",class:"text-sm font-medium mb-2 text-white"},"Content",-1),V={class:"flex mt-6"},$=["disabled"],j=r({__name:"Create",props:{question:{}},setup(i){const s=i,t=u({content:""}),d=async()=>{(await v.post(`/questions/${s.question.id}/choices`,t.value)).status===201&&w.get(`/questions/${s.question.id}/choices`)};return(c,o)=>(_(),p(h,null,[a(m(f),{title:"Create New Choice"}),a(y,null,{header:n(()=>[C]),default:n(()=>[e("div",q,[e("div",k,[e("form",{onSubmit:x(d,["prevent"])},[e("div",N,[e("div",B,[D,b(e("input",{id:"content","onUpdate:modelValue":o[0]||(o[0]=l=>t.value.content=l),type:"text",class:"bg-gray-100 rounded-lg",placeholder:"Enter content"},null,512),[[g,t.value.content]])]),e("div",V,[e("button",{type:"submit",class:"px-3 py-1 rounded bg-blue-500 opacity-80 hover:opacity-100 text-white disabled:cursor-not-allowed disabled:bg-success disabled:opacity-50",disabled:!t.value.content}," Create ",8,$)])])],32)])])]),_:1})],64))}});export{j as default};
