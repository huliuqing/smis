
import BaseInput from '../../views/components/Inputs/BaseInput.vue'
import BaseCheckbox from '../../views/components/Inputs/BaseCheckbox.vue'
import BaseRadio from '../../views/components/Inputs/BaseRadio.vue'
import BaseDropdown from '../../views/components/BaseDropdown.vue'
import Card from '../../views/components/Cards/Card.vue'

/**
 * You can register global components here and use them as a plugin in your main Vue instance
 */

const GlobalComponents = {
  install (Vue) {
    Vue.component(BaseInput.name, BaseInput)
    Vue.component(BaseCheckbox.name, BaseCheckbox)
    Vue.component(BaseRadio.name, BaseRadio)
    Vue.component(BaseDropdown.name, BaseDropdown)
    Vue.component(Card.name, Card)
  }
}

export default GlobalComponents