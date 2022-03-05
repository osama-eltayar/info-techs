<template>
    <div>
        <form action="" @submit.prevent="onFormSubmit">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Survey" v-model="form.title">
                <label for="floatingInput">Survey</label>
            </div>

            <div class="question-container" v-for="(question,questionIdx) in form.questions"
                 :key="`question`+questionIdx">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="questionTitle" placeholder="Question Title"
                           :value="question.title" @input="onQuestionTitleChange(questionIdx,$event)">
                    <label for="questionTitle">Question Title</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="" id="question-type" class="form-control" @change="onTypeChange(questionIdx,$event)">
                        <option value="" disabled selected> Type</option>
                        <option v-for="type in questionTypes" :value="type.value"
                                :selected="type.value === question.type">
                            {{ type.name }}
                        </option>
                    </select>
                </div>
                <div class="row">
                    <div class="answer-container "
                         :class="{col : question.answers.length <=4 , 'col-3' :  question.answers.length >4 }"
                         v-for="(answer,answerIdx) in question.answers"
                         :key="`answer`+answerIdx">
                        <div class="form-floating mb-3 ">
                            <input type="text" class="form-control" :id="`answer-title-${answerIdx}`"
                                   placeholder="Answer Title"
                                   :value="answer.title" @input="onAnswerTitleChange(questionIdx,answerIdx,$event)">
                            <label :for="`answer-title-${answerIdx}`">Answer Title</label>
                        </div>
                        <button type="button" @click="onAddLabel(questionIdx,answerIdx)"
                                v-if="question.type == questionTypeEnum.radio">Add Option
                        </button>

                        <div class="row">
                            <div class="answer-label-container "
                                 :class="{col : answer.labels.length <=2 , 'col-6' :  answer.labels.length >2 }"
                                 v-for="(answerLabel,answerLabelIdx) in answer.labels"
                                 :key="`answer-label-${answerIdx}-${answerLabelIdx}`"
                                 v-if="question.type == questionTypeEnum.radio">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="label-option" placeholder="Option Title"
                                           :value="answerLabel.title"
                                           @input="onAnswerLabelTitleChange(questionIdx,answerIdx,answerLabelIdx,$event)">
                                    <label for="label-option">Option Title</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <button type="button" class="btn btn-primary" @click="onAddAnswer(questionIdx)">Add Answer
                </button>

                <hr v-if="questionIdx != form.questions.length && form.questions.length > 1">
            </div>

            <button @click="onAddQuestion" type="button" class="btn btn-primary">Add Question</button>

            <button>Save</button>
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

    }
}
</script>

<style scoped>

</style>
