const { ref } = Vue

const { exportFile, useQuasar } = Quasar; 

const columns = [
    { name: 'id', required: true, label: 'Id', align: 'left', field: row => row.name,format: val => `${val}`, sortable: true },
    { name: 'type', align: 'center', label: 'Type', field: 'type', sortable: true },
    { name: 'numero', label: 'Numéro', field: 'numero', sortable: true },
    { name: 'equipements', label: 'Equipements', field: 'equipements' },
    { name: 'statut', label: 'Statut', field: 'statut' },
    { name: 'kmjour', label: 'Km/J', field: 'kmjour', sortable: true, sort: (a, b) => parseInt(a, 10) - parseInt(b, 10) },
    { name: 'kmreel', label: 'Km Réel', field: 'kmreel', sortable: true, sort: (a, b) => parseInt(a, 10) - parseInt(b, 10) },
    { name: 'horametre', label: 'Horamétre', field: 'horametre', sortable: true, sort: (a, b) => parseInt(a, 10) - parseInt(b, 10) },
    { name: 'action', label: 'Action', field: 'action' }

]

const rows = [{
        id: '',
        type: 'TypeTest',
        numero: 'MG001',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        kmjour: 240,
        kmreel: 15400,
        horametre: 8,
        action: ''
    },
    {
        id: '',
        type: 'TypeTest',
        numero: 'MG001',
        equipements: 'TE, IMP, DOU',
        statut: 'No',
        kmjour: 240,
        kmreel: 15400,
        horametre: 8,
        action: ''
    },
    {
        id: '',
        type: 'TypeTest',
        numero: 'MG001',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        kmjour: 240,
        kmreel: 15400,
        horametre: 8,
        action: ''
    },
    {
        id: '',
        type: 'TypeTest',
        numero: 'MG001',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        kmjour: 240,
        kmreel: 15400,
        horametre: 8,
        action: ''
    },
    {
        id: '',
        type: 'TypeTest',
        numero: 'MG001',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        kmjour: 240,
        kmreel: 15400,
        horametre: 8,
        action: ''
    },
    {
        id: '',
        type: 'TypeTest',
        numero: 'MG001',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        kmjour: 240,
        kmreel: 15400,
        horametre: 8,
        action: ''
    },
    {
        id: '',
        type: 'TypeTest',
        numero: 'MG001',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        kmjour: 240,
        kmreel: 15400,
        horametre: 8,
        action: ''
    }
]
function wrapCsvValue (val, formatFn) {
    let formatted = formatFn !== void 0
      ? formatFn(val)
      : val
  
    formatted = formatted === void 0 || formatted === null
      ? ''
      : String(formatted)
  
    formatted = formatted.split('"').join('""')
    /**
     * Excel accepts \n and \r in strings, but some other CSV parsers do not
     * Uncomment the next two lines to escape new lines
     */
    // .split('\n').join('\\n')
    // .split('\r').join('\\r')
  
    return `"${formatted}"`
  }
  
const app = Vue.createApp({
    setup () {
      return {
       /*  statut: ref('Disponible'), */
       chariot: ref(null),
       optionsChariot: [
         {label:'Selectionner le type', disable:true}, 
         {label:'Chariot Frontal', icon:''},
         {label:'Moulinette', icon:''},
         {label:'Moulinette Gerbeur', icon:''},
         {label:'Retract ', icon:''}
         ],
      equipements: ref([]),
      optionsEquipements: [
        {label: 'Terminal Embarqué (TE)', value: 1},
        {label: 'L\'imprimente',value: 2},
        {label: 'LaDouchette', value: 3},
        ],
      statut: ref(null),
      optionsStatut: [
        {label:'Selectionner le statut', disable:true}, 
        {label:'Disponible', icon:'check_circle'},
        {label:'Indisponible', icon:'unpublished'}
        ],
        filter: ref(''),
        columns,
        rows,

        exportTable () {
            // naive encoding to csv format
            const content = [columns.map(col => wrapCsvValue(col.label))].concat(
              rows.map(row => columns.map(col => wrapCsvValue(
                typeof col.field === 'function'
                  ? col.field(row)
                  : row[ col.field === void 0 ? col.name : col.field ],
                col.format
              )).join(','))
            ).join('\r\n')
    
            const status = exportFile(
              'table-export.csv',
              content,
              'text/csv'
            )
    
            if (status !== true) {
              $q.notify({
                message: 'Le navigateur a refusé le téléchargement du fichier...',
                color: 'negative',
                icon: 'warning'
              })
            }
          }
      }
    }
  })
    
  app.use(Quasar, { config: {} })
  app.mount('#q-app')
  