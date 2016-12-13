<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VUEJS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body class="container">


<div id="app">
    <div v-if="success" class="alert alert-success" id="feedback" style="margin-top: 1em;">HISFA; it works!</div>

    <article id="foam" v-for="foam in foams">
        <h3>@{{ foam.name }}</h3>
    </article>
</div>


<script src="https://unpkg.com/vue@2.0.5/dist/vue.js"></script>
<script src="https://unpkg.com/vue-resource@1.0.3/dist/vue-resource.min.js"></script>
<script>

    var FoamView = new Vue({
        el: "#app",

        data: {
            foams: null,
            name: "",
            success: false
        },

        created: function(){
            this.fetchFoams();
        },

        methods: {
            fetchFoams: function() {

                console.log('yeah');

                this.$http.get('/api/v1/foams').then((response) => {
                    this.foams = response.body;
            }, (response) => {
                    // error callback
                });

            }
        }
    });

</script>

</body>
</html>