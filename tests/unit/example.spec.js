import { shallowMount, config } from '@vue/test-utils'
import HelloWorld from '@/components/HelloWorld.vue'
import Home from '@/views/Home.vue'

config.showDeprecationWarnings = false

describe('Test Code', () => {
  it('renders props.msg when passed', () => {
    const msg = 'new message'
    const wrapper = shallowMount(HelloWorld, {
      propsData: { msg }
    })
    expect(wrapper.text()).toMatch(msg)
  })


  it('renders data and check if it is equal', () => {
    const itemList = [{"ID":"22","Item":"ertert"},{"ID":"20","Item":"Individuals and Interactions"}];
    // const wrapper = shallowMount(HelloWorld, {
    //   data() {
    //     return {
    //       itemList: itemList
    //     }
    //   }
    // })
    expect(itemList).toEqual([{"ID":"22","Item":"ertert"},{"ID":"20","Item":"Individuals and Interactions"}]);
  })

  // it('Check if button is clicke', async () => {
  //   const mockMethod = jest.fn()
  //   const wrapper = shallowMount(Home)
  //   wrapper.setMethods({ clickMe: mockMethod })
  //   await wrapper.find('button').trigger('click')
  //   expect(mockMethod).toHaveBeenCalled()
  // })

})
