<script setup lang="ts">

</script>
<template>
  <div class="sidebar w-1/6 p-4 text-white">
    <ul class="space-y-2">
        <li>
            <a :href="route('polls.index')" class="block py-2 px-4 hover:bg-gray-500 border-b border-gray-500">Polls</a>
        </li>
        <li>
            <a :href="route('votes.index')" class="block py-2 px-4 hover:bg-gray-500 border-b border-gray-500">Votes</a>
        </li>
    </ul>
  </div>
</template>
