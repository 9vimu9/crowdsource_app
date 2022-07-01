<template>
    <h3 class="ml-auto text-lg text-black mb-1  ">ප්‍රශ්න සෑදීමට කියවිය යුතු ඡේදය </h3>
    <div
        class="p-6 mb-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-400 dark:hover:bg-gray-400 hover:bg-gray-400 dark:border-gray-700 lg:mb-0">
        <p class="font-normal text-black" @mouseup="mouseup">
            {{ paragraph.paragraph }}
        </p>
    </div>
    <h3 class="ml-auto text-lg text-black mt-10 mb-1  ">අලුත් ප්‍රශ්නය පහල කොටුවේ type කරන්න </h3>
    <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
        <div class="py-2 px-4 bg-white rounded-t-lg dark:bg-gray-800">
                <textarea
                    id="comment"
                    rows="4"
                    class="px-0 w-full text-lg text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                    placeholder="ප්‍රශ්නය මෙතන type කරන්න"></textarea>
        </div>
        <div class="flex justify-between items-center py-2 px-3 border-t dark:border-gray-600">
            <button type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-lg font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                Save / සුරකින්න
            </button>
            <div>
                <p class="ml-auto text-lg text-white  text-right "><b><i>පිළිතුර :</i></b> {{ currentSelectedText }}
                </p>
            </div>
        </div>
    </div>
    <hr>
    <h3 class="ml-auto text-lg text-black  mt-10 mb-1 text-right ">කලින් හදපු ප්‍රශ්න </h3>
    <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
        <div class="py-2 px-4 bg-white rounded-t-lg dark:bg-gray-800">
                <textarea
                    id="comment"
                    rows="4"
                    class="px-0 w-full text-lg text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                    placeholder="ප්‍රශ්නය මෙතන type කරන්න">න් කළේය. කෙසේ වෙතත්, ඔවුන් දෙදෙනා නැවතත් කරන් ජෝහර්ගේ 50 වැනි උපන්දින සාදයේදී එකට  </textarea>
        </div>

        <div class="flex justify-between items-center py-2 px-3 border-t dark:border-gray-600">
            <div></div>
            <div class="flex pl-0 space-x-1 sm:pl-2">
                <button type="button"
                        class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="w-5 h-5"
                         fill="currentColor"
                         viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                              clip-rule="evenodd">
                        </path>
                    </svg>
                    <span>වෙනස් කරන්න</span>
                </button>
                <button type="button"
                        class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="w-5 h-5"
                         fill="currentColor"
                         viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span>අයින් කරන්න</span>
                </button>
            </div>
        </div>

    </div>


</template>

<script>
import useParagraphs from '../../composables/paragraphs'
// import useQuestions from '../../composables/questions'

import {onMounted} from 'vue';
let currentSelectedText;


export default {
    data(){
        return {currentSelectedText}
    },
    setup() {
        const {errors, paragraph, newParagraph} = useParagraphs()

        onMounted(newParagraph)

        return {
            paragraph,
        }
    },
    methods: {

        mouseup() {
            const selectedAnswer = this.getSelectionText()
            if (!selectedAnswer) {
                return
            }
            const result = selectedAnswer.split(" ").every(val => this.paragraph.paragraph.split(" ").includes(val))

            if (result) {
                this.$toast.clear();
                this.currentSelectedText = selectedAnswer
            } else {
                this.$toast.open({
                    message: "සම්පුර්ණ වචනයම select කරන්න.",
                    type: "error",
                    duration: 5000,
                    dismissible: true,
                    position: 'top',

                })
            }


        },
        getSelectionText() {
            if (window.getSelection) {
                return window.getSelection().toString();
            } else if (document.selection && document.selection.type !== "Control") {
                return document.selection.createRange().text;
            }
            return "";
        }


    },
}
</script>
