<template>
  <section class="sample-component">
    <section class="tab-layout">
      <div class="tabs">
        <button class="tab" v-on:click="page = 1">tab1</button>
        <button class="tab" v-on:click="page = 2">tab2</button>
        <button class="tab" v-on:click="page = 3">tab3</button>
      </div>
      <div class="content" v-bind:class="{ show: page == 1 }">
        <p>page1</p>
      </div>
      <div class="content" v-bind:class="{ show: page == 2 }">
        <p>page2</p>
      </div>
      <div class="content" v-bind:class="{ show: page == 3 }">
        <p>page3</p>
      </div>
    </section>
  </section>
</template>

<script>
import { ref } from "vue";
import Axios from "axios";

export default {
  setup(props, context) {
    const page = ref(1); // 追加
    return {
      page,
    };
  },
  props: {},
};
</script>

<style lang="scss">
.sample-component {
  & .tab-layout {
    padding: 0;
    margin: 0;

    & * {
      padding: 0;
      margin: 0;
    }

    & .tabs {
      display: flex;
      flex-wrap: nowrap;
      justify-content: left;

      & .tab {
        width: 100%;
        line-height: 2rem;

        color: black;
        background-color: #ddd;

        transition: all 500ms;
        &:hover {
          color: white;
          background-color: #1d2946;
        }
      }
    }

    & .content {
      max-height: 0rem;
      opacity: 0;

      transition: all 500ms;
      &.show {
        max-height: 4rem;
        opacity: 1;
      }
    }
  }
}
</style>