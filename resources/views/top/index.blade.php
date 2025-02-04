<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>

    <!-- 追加 -->
    <link rel="stylesheet" href="/css/build/top/index.css">
</head>

<body>
    <header>
        <a href="/login">
            <h2>ログイン</h2>
        </a>
    </header>

    <main>
        <h2 v-html="title"></h2>
        <button v-on:click="buttonClick">変更</button>

        <form action="">
            <p v-html="validateResult"></p>
            <input type="text" name="name" v-model="name">
            <button type="button" v-on:click="validate">ひらがな確認</button>
        </form>

        <!-- 追加 -->
        <section class="tab-layout">
            <div class="tabs">
                <button class="tab" v-on:click="page=1">tab1</button>
                <button class="tab" v-on:click="page=2">tab2</button>
                <button class="tab" v-on:click="page=3">tab3</button>
            </div>
            <div class="content" v-bind:class="{ show : page == 1 }">
                <p>page1</p>
            </div>
            <div class="content" v-bind:class="{ show : page == 2 }">
                <p>page2</p>
            </div>
            <div class="content" v-bind:class="{ show : page == 3 }">
                <p>page3</p>
            </div>
        </section>
    </main>

    <script src="/js/build/top/index.js"></script>
</body>

</html>