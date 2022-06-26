<template>
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <p>{{paragraph.paragraph}}</p>
    </div>
</template>

<script>
import useParagraphs from '../../composables/paragraphs'
// import useQuestions from '../../composables/questions'

import { onMounted } from 'vue';

export default {
    setup() {
        const { errors, paragraph, newParagraph } = useParagraphs()

        onMounted(newParagraph)

        return {
            paragraph,
        }
    }
}
</script>
