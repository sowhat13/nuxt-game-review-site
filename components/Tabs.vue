<template>
  <article class=" text-white tabsbg   mx-auto mb-10 h-64  items-center text-center ">
<header class="tabs  ">
<ul >
<li class=" mx-auto items-center text-center py-1" v-for="(tab, index) in tabs" :key="index">

<div class="nav-item font-bold text-lg " :class="{'is-active': tab.isActive }" @click="selectTab(tab)">
    {{tab.name}}
     </div>

</li>
</ul>
</header>
    <section class="tabs-details  ">
<slot> </slot>

    </section>
  </article>
</template>

<script>
import Tab from "@/components/Tab"


export default {
data: () => {
    return {
        tabs: []
    }
},

methods: {
selectTab(selectedTab) {
     this.tabs.forEach(tab => {
         tab.isActive = tab.name === selectedTab.name;
     })
}
},

created() {
    this.tabs = this.$children;
}


}
</script>

<style>

.tabs {

   
 background: rgb(15, 39, 48);
  background: linear-gradient(
    90deg,
    rgba(15, 39, 48, 1) 0%,
    rgba(31, 88, 143, 1) 50%,
    rgba(22, 154, 179, 1) 100%
  );
}

.tabsbg {
    background-color:white;
    
}

.tab-details {

    padding:10px;
}

ul {
    display:flex;
    padding:0;
    list-style:none;
}

li {
    margin:10px;
}

.nav-item {
    cursor:pointer;

   
}


.nav-item:hover {
    color:rgb(211, 211, 211);

   
}

.is-active {


border-bottom: 5px solid white;

   
}


</style>