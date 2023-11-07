<!--<template>-->
<!--    <div class="row justify-content-center">-->
<!--        <ul>-->
<!--            <li v-for="todo in todos" :key="todo.id">{{todo.contents}}</li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->

<!--    export default {-->
<!--        props:['todos']-->
<!--    }-->
<!--</script>-->






<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                        <article class="wrap">
                            <section class="todo-form">
                                    <input type="text"
                                           name="todo-text"
                                           class="input-text"
                                           placeholder="please input todo"
                                           :value="text"
                                           @input="inputText">
                                    <button
                                        type="submit"
                                        class="add-button"
                                        @click="addTodo">
                                        ADDTODO
                                    </button>
                            </section>

                            <section class="list-area">
                                <div class="area-incomplete">
                                    <p class="todo-title">incomplete items</p>
                                    <ul class="todo-area">
                                        <li v-for="todo in todos" :key="todo.id">{{todo.contents}}</li>
                                        <li
                                            v-for="(item, i) in incompleteTodo"
                                            :key="i"
                                            class="list">
                                            <span class="list-label">{{item.text}}</span>
                                            <span class="button-area">
                                                <button
                                                    class="list-button button-done"
                                                    @click="toggleIsDone(item.id)"
                                                    >DONE</button>
                                                <button
                                                    class="list-button button-delete"
                                                    @click="deleteTodo(item.id)"
                                                    >DELETE</button>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="area-complete">
                                    <p class="todo-title">complete items</p>
                                    <ul class="todo-area">
                                        <li
                                          v-for="(item, i) in doneTodo"
                                          :key="i"
                                          class="list">
                                            <span class="list-label">{{item.text}}</span>
                                            <span class="button-area">
                                                <button
                                                    class="list-button"
                                                    @click="toggleIsDone(item.id)"
                                                    >RETURN</button>
                                                <button
                                                    class="list-button button-delete"
                                                    @click="deleteTodo(item.id)"
                                                    >DELETE</button>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </article>
                </div>
            </div>
        </div>
</template>

<script>
export default {  //外部から参照できるようにする
        props: ["todos"], //親コンポーネントからデータを取る、そこからさらにtemplate内に表記することができる。名前は同一に
        data() {
            return {
                todos: [],
                text: ''
            };
        },
        methods: {
            inputText(e) {
                this.text = e.target.value;
            },
            addTodo(){
                if(!this.text) return;

                const text = this.text;
                const id = Math.ceil(Math.random() * 1000);
                const todo = { //TODOオブジェクトの生成
                    id,
                    text,
                    isDone: false
                };
                this.todos.push(todo);
                this.resetText();
            },
            resetText() {
                this.text = '';
            },
            deleteTodo(id) {
                const index = this.getIndexBy(id); //idを元にクリックされたtodosの何番目に当たるのか調べる関数
                this.todos.splice(index, 1);//削除する番数と何個削除するか
            },
            toggleIsDone(id) {
                const index = this.getIndexBy(id);
                this.todos[index].isDone = !this.todos[index].isDone;
            },
            getIndexBy(id) {
                const filteredTodo = this.todos.filter(todo => todo.id === id)[0];
                const index = this.todos.indexOf(filteredTodo);
                return index;
            }
        },
        computed: {
            doneTodo() {
                return this.todos.filter( todo => todo.isDone === true);
            },
            incompleteTodo(){
                return this.todos.filter( todo => todo.isDone === false);
            }
        }
    }
</script>


