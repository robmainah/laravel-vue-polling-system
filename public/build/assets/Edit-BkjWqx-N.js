import{d as n,l as p,g as c,a,u,w as i,F as m,o as f,Z as _,b as t,f as b,j as h,m as x,p as g,O as v}from"./app-PbwL71_3.js";import{_ as y}from"./AuthenticatedLayout.vue_vue_type_script_setup_true_lang-D9GsOmAc.js";import"./ApplicationLogo-BWCnsUYg.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const w=t("h2",{class:"font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"},"Polls",-1),k={class:"w-full p-4"},E={class:"dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg py-6 px-4"},B={class:"grid"},D={class:"flex flex-col"},P=t("label",{for:"title",class:"text-sm font-medium mb-2 text-white"}," Title ",-1),V={class:"flex mt-6"},$=["disabled"],T=n({__name:"Edit",props:{poll:{}},setup(d){const s=p({title:d.poll.title}),r=async l=>{(await g.put(`/polls/${l}`,s.value)).status===200&&v.get("/polls")};return(l,e)=>(f(),c(m,null,[a(u(_),{title:"Edit Poll"}),a(y,null,{header:i(()=>[w]),default:i(()=>[t("div",k,[t("div",E,[t("form",{onSubmit:e[1]||(e[1]=b(o=>r(l.poll.id),["prevent"]))},[t("div",B,[t("div",D,[P,h(t("input",{id:"title","onUpdate:modelValue":e[0]||(e[0]=o=>s.value.title=o),type:"text",class:"bg-gray-100 rounded-lg",placeholder:"Enter title"},null,512),[[x,s.value.title]])]),t("div",V,[t("button",{type:"submit",class:"px-3 py-1 rounded bg-blue-500 opacity-80 hover:opacity-100 text-white disabled:cursor-not-allowed disabled:bg-success disabled:opacity-50",disabled:!s.value.title}," Update ",8,$)])])],32)])])]),_:1})],64))}});export{T as default};