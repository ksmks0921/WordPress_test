import { getStorage, getService } from 'vc-cake'

const cook = getService('cook')
const utils = getService('utils')
const migrationStorage = getStorage('migration')

migrationStorage.on('migrateElement', (elementData) => {
  if (elementData.tag === 'vc_raw_js') {
    let baseAttrs = elementData._generalElementAttributes
    baseAttrs.rawJs = decodeURIComponent(utils.base64decode(elementData._subInnerContent.replace(/^#E-8_/, '').trim()))
    baseAttrs.rawJs = baseAttrs.rawJs.replace(/<\/?script[^>]*>/g, '')
    const attrs = Object.assign({}, baseAttrs, { tag: 'rawJs' })
    const cookElement = cook.get(attrs)
    migrationStorage.trigger('add', cookElement.toJS())
    elementData._migrated = true
  }
})
