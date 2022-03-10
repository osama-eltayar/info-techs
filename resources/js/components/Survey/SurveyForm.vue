<template>
    <div>
        <form action="" @submit.prevent="onFormSubmit">
            <div class="save-btn">
                <button class="btn btn-primary">Save</button>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Survey" v-model="form.title">
                <label for="floatingInput">Survey</label>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item"
                        v-for="idx in form.questions.length"
                        :key="`quest-nav-${idx}`"
                        :class="{active : activeQuestionNav == idx}"
                    >
                        <a class="page-link"
                           href="#"
                           @click="onQuestionNavClick(idx,$event)"

                        >
                            {{idx  }}
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="d-flex justify-content-center text-center mb-2">
                <div>
                    <button @click="onAddQuestion" type="button" class="btn btn-primary">Add Question</button>
                </div>
            </div>


            <div class="question-container " v-for="(question,questionIdx) in form.questions"
                 :key="`question`+questionIdx" :class="{'d-none' : questionIdx != activeQuestionNav-1}">
                <div class="row">
                    <div class="col-10">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="questionTitle" placeholder="Question Title"
                                   :value="question.title" @input="onQuestionTitleChange(questionIdx,$event)">
                            <label for="questionTitle">Question Title</label>
                        </div>
                    </div>
                  <div class="col">
                      <button class="btn btn-danger" type="button" @click="onRemoveQuestion(questionIdx)" v-if="form.questions.length > 1">Remove</button>
                  </div>

                </div>
                    <div class="col-10">
                        <div class=" mb-3">
                            <select name="" id="question-type" class="form-control" @change="onTypeChange(questionIdx,$event)">
                                <option value="" disabled selected> Type</option>
                                <option v-for="type in questionTypes" :value="type.value"
                                        :selected="type.value === question.type">
                                    {{ type.name }}
                                </option>
                            </select>
                        </div>
                    </div>

                <div class="row">
                    <div class="answer-container "
                         :class="{col : question.answers.length <=3 , 'col-4' :  question.answers.length >3,'answer-container-border' : (question.type == questionTypeEnum.radio)}"
                         v-for="(answer,answerIdx) in question.answers"
                         :key="`answer`+answerIdx">
                        <div class="row">
                            <div class="col-9"  >
                                <div class="form-floating mb-3 " style="position:relative;">
                                    <input type="text" class="form-control" :id="`answer-title-${answerIdx}`"
                                           placeholder="Answer Title"
                                           :value="answer.title" @input="onAnswerTitleChange(questionIdx,answerIdx,$event)" >
                                    <label :for="`answer-title-${answerIdx}`">Answer Title</label>
                                    <i class="fa fa-trash text-danger remove-icon"  aria-hidden="true"
                                            @click="onRemoveAnswer(questionIdx,answerIdx)"
                                            v-if="question.answers.length > 1">
                                    </i>

                                </div>
                            </div>
                        </div>


                        <div class="d-flex justify-content-center text-center mb-2" >
                            <div>
                                <button type="button" class="btn btn-primary" @click="onAddLabel(questionIdx,answerIdx)"
                                        v-if="question.type == questionTypeEnum.radio">Add Option
                                </button>
                            </div>
                        </div>

                        <div class="row" v-if="question.type">
                            <div class="answer-label-container "
                                 :class="{col : answer.labels.length <=2 , 'col-6' :  answer.labels.length >2 }"
                                 v-for="(answerLabel,answerLabelIdx) in answer.labels"
                                 :key="`answer-label-${answerIdx}-${answerLabelIdx}`"
                                 v-if="question.type == questionTypeEnum.radio">
                                <div class="form-floating mb-3" style="position: relative;">
                                    <input type="text" class="form-control" id="label-option" placeholder="Option Title"
                                           :value="answerLabel.title"
                                           @input="onAnswerLabelTitleChange(questionIdx,answerIdx,answerLabelIdx,$event)">
                                    <label for="label-option">Option Title</label>
                                    <i class="fa fa-trash text-danger remove-icon"  aria-hidden="true"
                                       @click="onRemoveLabel(questionIdx,answerIdx,answerLabelIdx)"
                                       v-if="answer.labels.length > 1">
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="d-flex justify-content-center text-center mb-2" v-if="question.type">
                    <div>
                        <button type="button" class="btn btn-primary"
                                @click="onAddAnswer(questionIdx)"
                        >
                            Add Answer
                        </button>
                    </div>
                </div>

<!--                <hr v-if="questionIdx != form.questions.length && form.questions.length > 1">-->
            </div>


        </form>
    </div>
</template>

<script>
export default {
    name: "SurveyForm",
    props: ['questionTypes', 'isEdit', 'formSubmitUrl', 'formData'],
    mounted() {
        if (this.isEdit)
            this.form = this.formData
        else
            this.form.questions.push({
                title: null,
                type: null,
                answers: []
            })
    },
    data() {
        return {
            activeQuestionNav : 1,
            question: {
                title: null,
                type: null,
                answers: []
            },
            answer: {
                title: null,
                labels: []
            },
            label: {
                title: null,
            },
            questionTypeEnum: {
                text: '1',
                checkbox: '2',
                radio: '3',
            },
            form: {
                title: null,
                questions: []
            }
        }
    },
    methods: {
        onAddQuestion() {
            this.form.questions.push({
                title: null,
                type: null,
                answers: []
            })
        },
        onTypeChange(questionIdx, event) {
            this.form.questions[questionIdx].type = event.target.value
            this.form.questions[questionIdx].answers = [{
                title: null,
                labels: []
            }]
            if (this.form.questions[questionIdx].type == this.questionTypeEnum.radio) {
                this.form.questions[questionIdx].answers[0].labels = [{
                    title: null,
                }]
            }
        },
        onQuestionTitleChange(questionIdx, event) {
            this.form.questions[questionIdx].title = event.target.value
        },
        onAnswerTitleChange(questionIdx, answerIdx, event) {
            this.form.questions[questionIdx].answers[answerIdx].title = event.target.value
        },
        onAnswerLabelTitleChange(questionIdx, answerIdx, labelIdx, event) {
            this.form.questions[questionIdx].answers[answerIdx].labels[labelIdx] = {title: event.target.value}
        },
        onAddLabel(questionIdx, answerIdx) {
            this.form.questions[questionIdx].answers[answerIdx].labels.push({
                title: null,
            })
        },
        onAddAnswer(questionIdx) {
            this.form.questions[questionIdx].answers.push({
                title: null,
                labels: []
            })
        },
        onFormSubmit() {
            if (this.isEdit)
                this.form['_method'] = 'PUT'

            axios.post(this.formSubmitUrl, this.form)
                .then(({data}) => {
                    if (data && data.data && data.data.redirect)
                        successRedirectTimeout = setTimeout(function () {
                            redirect(data.data.redirect);
                        }, 1000);

                    if (data && data.message)
                        toastr.success(data.message);

                }).catch(({response}) => {
                const {data, status} = response;
                if (status == 422) {
                    toastr.clear();
                    toastr.error(Object.values(data.errors)[0][0])
                }

                if ([401, 402, 403, 429].indexOf(status) != -1) {
                    toastr.clear();
                    toastr.error(data.message);
                }


                if (status == 500)
                    toastr.error("Internal Server Error");
            })
        },
        onQuestionNavClick(questionIdx,event){
            event.preventDefault();
            this.activeQuestionNav = questionIdx;
        },
        onRemoveQuestion(questionIdx){
            this.form.questions = this.form.questions.filter((_,itemIdx)=>{
                return questionIdx != itemIdx;
            })
            if (this.activeQuestionNav != 1)
                this.activeQuestionNav--;

        },
        onRemoveAnswer(questionIdx,answerIdx){
            this.form.questions[questionIdx].answers =   this.form.questions[questionIdx].answers.filter((_,itemIdx)=>{
                return answerIdx != itemIdx;
            })
        },
        onRemoveLabel(questionIdx,answerIdx,answerLabelIdx){
            this.form.questions[questionIdx].answers[answerIdx].labels =    this.form.questions[questionIdx].answers[answerIdx].labels.filter((_,itemIdx)=>{
                return answerLabelIdx != itemIdx;
            })
        }

    }
}
</script>

<style scoped>
.save-btn{
    position: fixed;
    right: 34px;
    bottom: 20px;
}
.remove-icon{
    position: absolute;
    right: 5px;
    top: 5px;
    cursor: pointer;
}
.answer-container-border{
    border: 1px solid #3548de;
    padding: 15px;
    margin: 10px 10px;
}
</style>
