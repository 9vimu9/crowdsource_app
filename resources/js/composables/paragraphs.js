import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useParagraphs() {
    const paragraph = ref([])

    const errors = ref('')
    const router = useRouter()

    const newParagraph = async () => {
        let response = await axios.get('/api/paragraph-new')
        paragraph.value = response.data.data
    }


    return {
        errors,
        paragraph,
        newParagraph
    }
}
