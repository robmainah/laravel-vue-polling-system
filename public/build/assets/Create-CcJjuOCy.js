import{d as c,l as p,g as u,a,u as m,w as n,F as _,o as f,Z as h,b as t,f as x,j as b,m as g,p as v,O as w}from"./app-PbwL71_3.js";import{_ as y}from"./AuthenticatedLayout.vue_vue_type_script_setup_true_lang-D9GsOmAc.js";import"./ApplicationLogo-BWCnsUYg.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const C=t("h2",{class:"font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"},"Create New Question",-1),k={class:"w-full p-4"},N={class:"dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg py-6 px-4"},B={class:"grid"},D={class:"flex flex-col"},Q=t("label",{for:"content",class:"text-sm font-medium mb-2 text-white"},"Content",-1),V={class:"flex mt-6"},$=["disabled"],O=c({__name:"Create",props:{poll:{}},setup(l){const s=l,e=p({content:""}),i=async()=>{(await v.post(`/polls/${s.poll.id}/questions`,e.value)).status===201&&w.get(`/polls/${s.poll.id}/questions`)};return(d,o)=>(f(),u(_,null,[a(m(h),{title:"Create New Question"}),a(y,null,{header:n(()=>[C]),default:n(()=>[t("div",k,[t("div",N,[t("form",{onSubmit:x(i,["prevent"])},[t("div",B,[t("div",D,[Q,b(t("input",{id:"content","onUpdate:modelValue":o[0]||(o[0]=r=>e.value.content=r),type:"text",class:"bg-gray-100 rounded-lg",placeholder:"Enter content"},null,512),[[g,e.value.content]])]),t("div",V,[t("button",{type:"submit",class:"px-3 py-1 rounded bg-blue-500 opacity-80 hover:opacity-100 text-white disabled:cursor-not-allowed disabled:bg-success disabled:opacity-50",disabled:!e.value.content}," Create ",8,$)])])],32)])])]),_:1})],64))}});export{O as default};