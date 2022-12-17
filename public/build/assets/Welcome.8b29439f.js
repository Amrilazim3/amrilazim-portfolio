import{h as f,z as H,i as L,o as s,g as a,d as e,n as x,F as b,x as y,t as v,A as w,a as d,r as V,B as S,C as _,j as g,w as M,f as C,c as z,b as n,L as B,u as P,e as A,k,D as j,H as D}from"./app.b3b2825f.js";import{_ as $}from"./_plugin-vue_export-helper.cdc0426e.js";const O={class:"container flex flex-wrap justify-between items-center mx-auto",bis_skin_checked:"1"},F=e("a",{href:"https://amrilazim.com/",class:"flex items-center"},[e("img",{src:"http://localhost/img/logo.png",class:"mr-3 h-6 sm:h-9",alt:"User Icon"}),e("span",{class:"self-center text-xl font-semibold whitespace-nowrap dark:text-white"},"amril azim")],-1),I=e("span",{class:"sr-only"},"Open main menu",-1),T=e("svg",{class:"w-6 h-6","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z","clip-rule":"evenodd"})],-1),W=[I,T],E={class:"flex flex-col p-4 mt-4 rounded-lg border border-light-tail-500 dark:border-dark-navy-100 md:flex-row md:space-x-8 md:mt-0 md:font-medium md:border-0"},N=["onClick","href"],U={__name:"Header",setup(o){const r=f("false"),t=f(!1),i=H([{name:"Home",href:"#home",active:!0},{name:"About",href:"#about",active:!1},{name:"Portfolio",href:"#portfolio",active:!1},{name:"Services",href:"#services",active:!1},{name:"Contact",href:"#contact",active:!1}]),p=c=>{t.value=c},h=c=>{i.forEach((l,m)=>{console.log("the index we click is "+c),console.log(m),m===c?l.active=!0:l.active=!1,console.log(l)})};return L(()=>{window.addEventListener("scroll",()=>window.scrollY>50?p(!0):p(!1))}),(c,l)=>(s(),a("nav",{class:x(["w-full fixed z-20 border-gray-200 px-2 sm:px-4 py-2.5 rounded",{"bg-light-primary dark:bg-dark-primary":t.value,"bg-white dark:bg-slate-800":!t.value}])},[e("div",O,[F,e("button",{onClick:l[0]||(l[0]=m=>r.value=!r.value),"data-collapse-toggle":"navbar-default",type:"button",class:"inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600","aria-controls":"navbar-default","aria-expanded":"false"},W),e("div",{class:x(["w-full md:block md:w-auto",{hidden:r.value}]),id:"navbar-default",bis_skin_checked:"1"},[e("ul",E,[(s(!0),a(b,null,y(i,(m,u)=>(s(),a("li",{key:u},[e("a",{onClick:ct=>h(u),href:m.href,class:x(["block py-2 pr-4 pl-3 rounded",m.active?"text-light-tail-100 dark:text-white":"text-light-tail-500 dark:text-dark-navy-100 hover:text-light-tail-100 dark:hover:text-white"])},v(m.name),11,N)]))),128))])],2)])],2))}},Z={},Y={class:"bg-light-secondary dark:bg-dark-secondary py-12"},q=w('<div class="container mx-auto"><div class="flex flex-col md:flex-row space-y-6 lg:space-y-0 items-center justify-between"><div class="flex space-x-6 items-center justify-center"><img class="h-8 w-auto" src="http://localhost/img/logo.png" alt="amrilazim.com"></div><p class="text-paragraph opacity-80 text-[15px]"> \xA9 2022 amrilazim.com All right reserved. </p></div></div>',1),J=[q];function R(o,r){return s(),a("footer",Y,J)}const G=$(Z,[["render",R]]),K={class:"bg-slate-200 dark:bg-slate-900"},Q={class:"min-h-screen"},X={__name:"Frontend",setup(o){return(r,t)=>(s(),a("div",K,[d(U),e("main",Q,[V(r.$slots,"default")]),d(G)]))}},ee={},te={id:"home",class:"flex items-center bg-light-primary dark:bg-dark-primary py-32 lg:py-0 overflow-hidden"},se=w('<div class="container mx-auto h-full"><div class="flex flex-col md:flex-row items-center h-full pt-8 lg:my-36"><div class="flex-1 flex flex-col items-center lg:items-start"><p class="text-lg text-accent text-md mb-[22px]"> Hey, I&#39;m Amril </p><h1 class="text-4xl leading-[44px] md:text-5xl md:leading-tight lg:text-7xl lg:leading-[1.2] font-bold md:tracking-[-2px]"> I am a Full Stack Developer </h1><p class="pt-4 pb-8 md:pt-6 md:pb-12 max-w-[480px] text-lg text-center lg:text-left"> I\u2019m a software engineer specializing in building (and occasionally designing) exceptional digital experiences. Currently, I\u2019m focused on building accessible, human-centered products at Upstatement. </p><button class="btn btn-md bg-accent hover:bg-light-secondary hover:text-light-tail-500 dark:hover:bg-dark-secondary dark:hover:text-dark-navy-100 md:btn-lg transition-all"><a href="/#contact"> Work with me </a></button><div class="pt-12"><h5 class="text-lg flex justify-center lg:justify-start items-center text-black dark:text-white mb-2"> Follow me on </h5><div class="flex items-center mb-6"><a class="w-12 h-12 rounded-full flex items-center justify-center border border-white text-black dark:text-white hover:bg-light-secondary hover:border-light-secondary dark:hover:bg-dark-secondary dark:hover:border-dark-secondary mr-3 sm:mr-4" href="https://twitter.com/amrilazim_"><svg width="16" height="12" viewBox="0 0 16 12" class="fill-current"><path d="M14.2194 2.06654L15.2 0.939335C15.4839 0.634051 15.5613 0.399217 15.5871 0.2818C14.8129 0.704501 14.0903 0.845401 13.6258 0.845401H13.4452L13.3419 0.751468C12.7226 0.258317 11.9484 0 11.1226 0C9.31613 0 7.89677 1.36204 7.89677 2.93542C7.89677 3.02935 7.89677 3.17025 7.92258 3.26419L8 3.73386L7.45806 3.71037C4.15484 3.61644 1.44516 1.03327 1.00645 0.587084C0.283871 1.76125 0.696774 2.88845 1.13548 3.59296L2.0129 4.90802L0.619355 4.20352C0.645161 5.18982 1.05806 5.96477 1.85806 6.52838L2.55484 6.99804L1.85806 7.25636C2.29677 8.45401 3.27742 8.94716 4 9.13503L4.95484 9.36986L4.05161 9.93346C2.60645 10.8728 0.8 10.8024 0 10.7319C1.62581 11.7652 3.56129 12 4.90323 12C5.90968 12 6.65806 11.9061 6.83871 11.8356C14.0645 10.2857 14.4 4.41487 14.4 3.2407V3.07632L14.5548 2.98239C15.4323 2.23092 15.7935 1.8317 16 1.59687C15.9226 1.62035 15.8194 1.66732 15.7161 1.6908L14.2194 2.06654Z"></path></svg></a><a class="w-12 h-12 rounded-full flex items-center justify-center border border-white text-black dark:text-white hover:bg-light-secondary hover:border-light-secondary dark:hover:bg-dark-secondary dark:hover:border-dark-secondary mr-3 sm:mr-4" href="https://www.linkedin.com/in/amril-azim-ab5361255"><svg width="14" height="14" viewBox="0 0 14 14" class="fill-current"><path d="M13.0214 0H1.02084C0.453707 0 0 0.451613 0 1.01613V12.9839C0 13.5258 0.453707 14 1.02084 14H12.976C13.5432 14 13.9969 13.5484 13.9969 12.9839V0.993548C14.0422 0.451613 13.5885 0 13.0214 0ZM4.15142 11.9H2.08705V5.23871H4.15142V11.9ZM3.10789 4.3129C2.42733 4.3129 1.90557 3.77097 1.90557 3.11613C1.90557 2.46129 2.45002 1.91935 3.10789 1.91935C3.76577 1.91935 4.31022 2.46129 4.31022 3.11613C4.31022 3.77097 3.81114 4.3129 3.10789 4.3129ZM11.9779 11.9H9.9135V8.67097C9.9135 7.90323 9.89082 6.8871 8.82461 6.8871C7.73571 6.8871 7.57691 7.74516 7.57691 8.60323V11.9H5.51254V5.23871H7.53154V6.16452H7.55423C7.84914 5.62258 8.50701 5.08065 9.52785 5.08065C11.6376 5.08065 12.0232 6.43548 12.0232 8.2871V11.9H11.9779Z"></path></svg></a><a class="w-12 h-12 rounded-full flex items-center justify-center border border-white text-black dark:text-white hover:bg-light-secondary hover:border-light-secondary dark:hover:bg-dark-secondary dark:hover:border-dark-secondary mr-3 sm:mr-4" href="https://github.com/Amrilazim3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="fill-black dark:fill-white w-5 h-5"><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"></path></svg></a></div></div></div><div class="flex flex-1 justify-end items-center h-full mt-8 md:mt-0"><img class="rounded-lg" src="http://localhost/img/hero.jpeg" alt="Hero"></div></div></div>',1),ae=[se];function oe(o,r){return s(),a("section",te,ae)}const le=$(ee,[["render",oe]]),re={},ie={id:"about",class:"section bg-light-secondary dark:bg-dark-secondary"},ne={class:"container mx-auto",initial:{opacity:0,y:100},visible:{opacity:1,y:0}},ce={class:"flex flex-col xl:flex-row gap-24"},de=e("img",{class:"object-cover h-full w-[566px] md:mx-auto lg:mx-0 rounded-2xl",src:"http://localhost/img/about.jpeg",alt:"about"},null,-1),me={class:"flex flex-col items-center text-center lg:items-start lg:text-left"},he={class:"flex flex-col"},ue=e("h2",{class:"text-3xl lg:text-4xl font-medium lg:font-extrabold mb-3"}," About Me ",-1),ge=C("Full Stack Developer"),pe=e("hr",{class:"mb-8 opacity-90 dark:opacity-5"},null,-1),ve=e("p",{class:"mb-8"},[C(" Work on all layers of a software application, from the user interface (UI) and front-end logic to the back-end services and database. "),e("br"),e("br"),C(" Responsible for designing, developing, and maintaining web and mobile applications, as well as working on the server-side infrastructure that powers them ")],-1),xe=e("a",{href:"#contact",class:"btn btn-md bg-accent text-light-tail-100"}," Contact me ",-1);function fe(o,r){const t=S("P"),i=_("motion");return s(),a("section",ie,[g((s(),a("div",ne,[e("div",ce,[de,e("div",me,[e("div",he,[ue,d(t,{class:"mb-4 text-accent"},{default:M(()=>[ge]),_:1}),pe,ve]),xe])])])),[[i]])])}const be=$(re,[["render",fe]]),_e={class:"bg-light-tail-100 dark:bg-dark-navy-500 py-16"},ke=e("h2",{class:"text-2xl mb-8 font-semibold text-center"},"Acquired Skills",-1),ye={class:"container mx-auto"},we={class:"grid grid-cols-8 md:grid-cols-10"},$e=["src","alt"],je={__name:"Skills",props:{skills:Object},setup(o){return(r,t)=>(s(),a("section",_e,[ke,e("div",ye,[e("div",we,[(s(!0),a(b,null,y(o.skills.data,i=>(s(),a("div",{class:"pb-10",key:i.id},[e("img",{src:i.image,alt:i.name,class:"lg:h-20"},null,8,$e)]))),128))])])]))}},Ce={class:"mb-6"},Me=["src","alt"],ze={class:"group-hover:text-light-tail-500 capitalize text-accent text-sm mb-3"},He={class:"group-hover:text-light-tail-500 text-2xl font-semibold capitalize mb-3"},Le={__name:"Project",props:{project:Object},setup(o){return(r,t)=>{const i=_("motion");return g((s(),z(n(B),{href:o.project.project_url,class:"group flex flex-col items-center text-center cursor-pointer",initial:{opacity:0,y:100},enter:{opacity:1,y:0}},{default:M(()=>[e("div",Ce,[e("img",{class:"rounded-2xl h-56",src:o.project.image,alt:o.project.name},null,8,Me)]),e("span",ze,v(o.project.skill.name),1),e("h3",He,v(o.project.name),1)]),_:1},8,["href"])),[[i]])}}},Ve={class:"container mx-auto"},Se={class:"mb-12 border-b-2 border-light-tail-100 dark:text-dark-navy-100"},Be={class:"grid grid-cols-5 md:grid-cols-8"},Pe={class:"cursor-pointer capitalize m-4 justify-self-stretch"},Ae=["onClick"],De={class:"grid gap-y-12 lg:grid-cols-3 lg:gap-8"},Oe={__name:"Projects",props:{skills:Object,projects:Object},setup(o){const r=o,t=f(r.projects.data),i=f("all"),p=h=>{h==="all"?(t.value=r.projects.data,i.value=h):(t.value=r.projects.data.filter(c=>c.skill.id===h),i.value=h)};return(h,c)=>(s(),a("div",Ve,[e("nav",Se,[e("ul",Be,[e("li",Pe,[e("button",{onClick:c[0]||(c[0]=l=>p("all")),class:x(["flex text-center px-4 py-2 hover:bg-accent text-white rounded-md",[i.value==="all"?"bg-accent":"bg-light-tail-500 dark:bg-dark-navy-100"]])}," All ",2)]),(s(!0),a(b,null,y(o.skills.data,l=>(s(),a("li",{class:"cursor-pointer capitalize m-4 justify-self-stretch",key:l.id},[e("button",{onClick:m=>p(l.id),class:x(["flex text-center px-4 py-2 hover:bg-accent text-white rounded-md",[i.value==l.id?"bg-accent":"bg-light-tail-500 dark:bg-dark-navy-100"]])},v(l.name),11,Ae)]))),128))])]),e("section",De,[(s(!0),a(b,null,y(t.value,l=>(s(),z(Le,{key:l.id,project:l},null,8,["project"]))),128))])]))}},Fe={id:"portfolio",class:"section bg-light-primary dark:bg-dark-primary min-h-[1400px]"},Ie={class:"container mx-auto",initial:{opacity:0,y:100},visible:{opacity:1,y:0}},Te=e("div",{class:"flex flex-col items-center text-center"},[e("h2",{class:"section-title"},"My Projects"),e("p",{class:"subtitle"}," Laravel is current favourite framework to work with any projects because it can do everything from front to the back end side. ")],-1),We=[Te],Ee={__name:"Portfolio",props:{skills:Object,projects:Object},setup(o){return(r,t)=>{const i=_("motion");return s(),a("section",Fe,[g((s(),a("div",Ie,We)),[[i]]),d(Oe,{skills:o.skills,projects:o.projects},null,8,["skills","projects"])])}}},Ne={},Ue={id:"services",class:"section bg-light-secondary dark:bg-dark-secondary"},Ze={class:"container mx-auto",initial:{opacity:0,y:100},visible:{opacity:1,y:0}},Ye=w('<div class="flex flex-col items-center text-center"><h2 class="section-title">What I do for clients</h2><p class="subtitle"> Create a full web application with entire scalfolding of front-end, back-end, deployment, and maintanence. </p></div><div class="grid lg:grid-cols-4 gap-8"><div class="bg-light-tail-100 dark:bg-dark-navy-500 p-6 rounded-2xl"><div class="text-accent rounded-sm w-12 h-12 flex justify-center items-center mb-24 text-[28px]"><svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg></div><h4 class="text-xl font-medium mb-2">Web Design</h4><p> Creative and detail-oriented web designer with a strong background in building visually stunning and user-friendly websites. </p></div><div class="bg-light-tail-100 dark:bg-dark-navy-500 p-6 rounded-2xl"><div class="text-accent rounded-sm w-12 h-12 flex justify-center items-center mb-24 text-[28px]"><svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg></div><h4 class="text-xl font-medium mb-2">Web Development</h4><p> Talented web developer with a strong background in building modern, responsive websites and web applications. Proficient in a variety of programming languages and frameworks, including HTML, CSS, JavaScript, Typescript, Laravel, Vue.js and Tailwindcss. </p></div><div class="bg-light-tail-100 dark:bg-dark-navy-500 p-6 rounded-2xl"><div class="text-accent rounded-sm w-12 h-12 flex justify-center items-center mb-24 text-[28px]"><svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg></div><h4 class="text-xl font-medium mb-2">Mobile Development</h4><p> Experienced mobile developer with a strong background in creating native and hybrid apps for Android platforms. Proficient in a variety of programming languages and frameworks, including Laravel, Vue.js, and Ionic. </p></div><div class="bg-light-tail-100 dark:bg-dark-navy-500 p-6 rounded-2xl"><div class="text-accent rounded-sm w-12 h-12 flex justify-center items-center mb-24 text-[28px]"><svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg></div><h4 class="text-xl font-medium mb-2">DevOps</h4><p> Proficient in a technology such as Docker. Strong background in system administration and configuration management in a Linux-Based server. </p></div></div>',2),qe=[Ye];function Je(o,r){const t=_("motion");return s(),a("section",Ue,[g((s(),a("div",Ze,qe)),[[t]])])}const Re=$(Ne,[["render",Je]]),Ge={id:"contact",class:"section bg-light-primary dark:bg-dark-primary"},Ke={class:"container mx-auto",initial:{opacity:0,y:100},visible:{opacity:1,y:0}},Qe=e("div",{class:"flex flex-col items-center text-center"},[e("h2",{class:"section-title"},"Contact Me"),e("p",{class:"subtitle"}," If you interest with me, feel free to send me an email or message. ")],-1),Xe={class:"flex flex-col lg:flex-row lg:gap-x-8"},et=w('<div class="flex flex-1 flex-col items-start space-y-8 mb-12 lg:mb-0 lg:pt-2"><div class="flex flex-col lg:flex-row gap-x-4"><div class="text-accent rounded-sm w-14 h-14 flex items-start justify-center mt-2 mb-4 lg:mb-0 text-2xl"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path></svg></div><div><h4 class="font-body text-xl mb-1"> Have a question? </h4><p class="text-accent font-normal"> Email me at a.azim0711@gmail. </p></div></div></div>',1),tt=["onSubmit"],st={key:0,class:"m-2 p-4 bg-light-tail-500 dark:bg-dark-navy-100 text-light-secondary rounded-lg"},at={class:"flex gap-8"},ot={key:0,class:"text-sm m-2 text-red-400"},lt={key:0,class:"text-sm m-2 text-red-400"},rt={key:1,class:"text-sm m-2 text-red-400"},it=e("button",{class:"btn btn-lg bg-accent hover:bg-secondary text-white"}," Send message ",-1),nt={__name:"ContactMe",setup(o){const r=f(!1),t=P({name:"",email:"",body:""});function i(c){r.value=c}function p(){t.reset(),i(!0),setTimeout(()=>i(!1),2e3)}const h=()=>{t.post(route("contact"),{preserveScroll:!0,onSuccess:()=>p()})};return(c,l)=>{const m=_("motion");return s(),a("section",Ge,[g((s(),a("div",Ke,[Qe,e("div",Xe,[et,e("form",{onSubmit:A(h,["prevent"]),class:"space-y-8 w-full max-w-md"},[r.value?(s(),a("div",st," Thank you for contacting me. ")):k("",!0),e("div",at,[e("div",null,[g(e("input",{"onUpdate:modelValue":l[0]||(l[0]=u=>n(t).name=u),type:"text",class:"input",placeholder:"Your Name"},null,512),[[j,n(t).name]]),n(t).errors.name?(s(),a("span",ot,v(n(t).errors.name),1)):k("",!0)]),e("div",null,[g(e("input",{"onUpdate:modelValue":l[1]||(l[1]=u=>n(t).email=u),type:"email",class:"input",placeholder:"Your Email"},null,512),[[j,n(t).email]]),n(t).errors.email?(s(),a("span",lt,v(n(t).errors.email),1)):k("",!0)])]),g(e("textarea",{"onUpdate:modelValue":l[2]||(l[2]=u=>n(t).body=u),class:"textarea",placeholder:"Your Meassage",spellcheck:"false"},null,512),[[j,n(t).body]]),n(t).errors.body?(s(),a("span",rt,v(n(t).errors.body),1)):k("",!0),it],40,tt)])])),[[m]])])}}},ht={__name:"Welcome",props:{skills:Object,projects:Object},setup(o){return(r,t)=>(s(),a(b,null,[d(n(D),{title:"Welcome Page"}),d(X,null,{default:M(()=>[d(le),d(be),d(je,{skills:o.skills},null,8,["skills"]),d(Ee,{skills:o.skills,projects:o.projects},null,8,["skills","projects"]),d(Re),d(nt)]),_:1})],64))}};export{ht as default};
