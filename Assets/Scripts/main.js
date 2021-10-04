const { ref } = Vue
const { exportFile, useQuasar } = Quasar;
/* Données Client */
const columnsClient = [{
        name: 'id',
        required: true,
        label: 'Id',
        align: 'center',
        field: rowsClient => rowsClient.name,
        format: val => `${val}`,
        sortable: true
    }, {
        name: 'nomClient',
        align: 'center',
        label: 'Nom de Client',
        align: 'center',
        field: 'nomClient',
        sortable: true
    },
    { name: 'action', label: 'Action', field: 'action' }
]
const rowsClient = [{
        id: '',
        nomClient: 'PMC(PMCH)',
        action: ''
    }, {
        id: '',
        nomClient: 'KIMBERLY CLARCK(PMCK)',
        action: ''
    }, {
        id: '',
        nomClient: 'DOUWE EGBERTS (JDE)',
        action: ''
    }]
    /* Donnéées TDB */
const columnsTdb = [{
        name: 'id',
        required: true,
        label: 'Id',
        align: 'center',
        field: rowsTdb => rowsTdb.name,
        format: val => `${val}`,
        sortable: true
    },
    {
        name: 'type',
        align: 'center',
        label: 'Type',
        align: 'center',
        field: 'type',
        sortable: true
    },
    {
        name: 'numero',
        label: 'Numéro',
        field: 'numero',
        align: 'center',
        sortable: true
    },
    {
        name: 'revision',
        label: 'Révision',
        field: 'revision',
        align: 'center',
        sortable: true
    },
    {
        name: 'equipements',
        label: 'Equipements',
        align: 'center',
        field: 'equipements'
    },
    {
        name: 'statut',
        label: 'Statut',
        align: 'center',
        field: 'statut',
        sortable: true
    },
    {
        name: 'heurejour',
        label: 'Heure/J',
        field: 'heurejour',
        align: 'center',
        sortable: true,
        sort: (a, b) => parseInt(a, 10) - parseInt(b, 10)
    },
    {
        name: 'kmreel',
        label: 'Km Réel',
        field: 'kmreel',
        align: 'center',
        sortable: true,
        sort: (a, b) => parseInt(a, 10) - parseInt(b, 10)
    },
    {
        name: 'horametre',
        label: 'Horamétre',
        field: 'horametre',
        align: 'center',
        sortable: true,
        sort: (a, b) => parseInt(a, 10) - parseInt(b, 10)
    },
    {
        name: 'client',
        label: 'Client',
        field: 'client',
        align: 'center',
        sortable: true,
        sort: (a, b) => parseInt(a, 10) - parseInt(b, 10)
    },
    { name: 'action', label: 'Action', field: 'action' }

]

const rowsTdb = [{
        id: '',
        type: 'Frontal Electrique',
        numero: 'BLITZ 316 DC',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        heurejour: 240,
        kmreel: 15400,
        horametre: 8,
        client: 'PMC(PMCH)',
        action: ''
    },
    {
        id: '',
        type: 'Frontal Electrique',
        numero: 'EFG218',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        heurejour: 240,
        kmreel: 15400,
        horametre: 8,
        client: 'KIMBERLY CLARCK(PMCK)',
        action: ''
    },
    {
        id: '',
        type: 'Gerbeur',
        numero: 'EGVS14',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        heurejour: 240,
        kmreel: 15400,
        horametre: 8,
        client: 'DOUWE EGBERTS (JDE)',
        action: ''
    },
    {
        id: '',
        type: 'Gerbeur',
        numero: 'EMD115i',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        heurejour: 240,
        kmreel: 15400,
        horametre: 8,
        client: 'INTERSNACK',
        action: ''
    },
    {
        id: '',
        type: 'Moulinette',
        numero: 'ERE225',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        heurejour: 240,
        kmreel: 15400,
        horametre: 8,
        client: 'INTERSNACK',
        action: ''
    },
    {
        id: '',
        type: 'Moulinette',
        numero: 'ERE225',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        heurejour: 240,
        kmreel: 15400,
        horametre: 8,
        client: 'INTERSNACK',
        action: ''
    },
    {
        id: '',
        type: 'Preparateur de Commande',
        numero: 'ECE225',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        heurejour: 240,
        kmreel: 15400,
        horametre: 8,
        client: 'Pas de Client',
        action: ''
    },
    {
        id: '',
        type: 'Preparateur de Commande a Mat',
        numero: 'N20 LI',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        heurejour: 240,
        kmreel: 15400,
        horametre: 8,
        client: 'BOLTON (Saupiquet)',
        action: ''
    },
    {
        id: '',
        type: 'Retractable',
        numero: 'ETV 320',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        heurejour: 240,
        kmreel: 15400,
        horametre: 8,
        client: 'BOLTON (Saupiquet)',
        action: ''
    }

]

function wrapCsvValue(val, formatFn) {
    let formatted = formatFn !== void 0 ?
        formatFn(val) :
        val

    formatted = formatted === void 0 || formatted === null ?
        '' :
        String(formatted)

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
    setup() {

        /*const $q = useQuasar();

                function onRejected(rejectedEntries) {
                    // Notify plugin needs to be installed
                    // https://quasar.dev/quasar-plugins/notify#Installation
                    $q.notify({
                        type: "negative",
                        message: `${rejectedEntries.length} file(s) did not pass validation constraints`
                    });
                }
                return { onRejected }
            } */

        return {
            modelTri: ref(null),
            optionsTri: [
                'Statut', 'Heure/Jour (- à +)', 'Heure/Jour (+ à -)', 'KM Réel (- à +)', 'KM Réel (+ à -)', 'Horamétre (+ à -)', 'Horamétre (- à +)', 'Client'
            ],
            modelFiltre: ref(null),
            optionsFiltre: [
                'Statut', 'Heure/Jour', 'KM Réel', 'Horamétre', 'Client'
            ],
            nomEquipement: ref(''),
            nomClient: ref(''),
            nomType: ref(''),
            clients: [
                'BOLTON (Saupiquet)', 'DOUWE EGBERTS (JDE)', 'INTERSNACK', 'KIMBERLY CLARCK (PMCK)', 'PMC (PMCH)', 'UNILEVER'
            ],
            observations: ref(''),
            numero: ref(''),
            km: ref(''),
            heurejour: ref(''),
            horametre: ref(''),
            chariot: ref(null),
            optionsChariot: [{
                    label: 'Selectionner le type',
                    imageChariot: 'Assets/Img/imgChariots.jpg',
                    disable: true
                },
                { label: 'Frontal Electrique', imageChariot: 'Assets/Img/chariot_frontal.jpg' },
                { label: 'Gerbeur', imageChariot: 'Assets/Img/moulinetteGerbeur.jpg' },
                { label: 'Moulinette ', imageChariot: 'Assets/Img/moulinette.jpg' },
                { label: 'Préparateur de Commande ', imageChariot: 'Assets/Img/prepCommande.jpg' },
                { label: 'Préparateur de Commande a Mat ', imageChariot: 'Assets/Img/prepCommandeMat.jpg' },
                { label: 'Rectractable ', imageChariot: 'Assets/Img/retract.jpg' }
            ],
            equipements: ref([]),
            optionsEquipements: [
                { label: 'Terminal Embarqué (TE)', value: 1 },
                { label: 'L\'imprimente', value: 2 },
                { label: 'LaDouchette', value: 3 },
            ],
            statut: ref(null),
            optionsStatut: [{
                    label: 'Selectionner le statut',
                    imgStatut: 'Assets/Img/checkUncheck.jpg',
                    disable: true
                },
                { label: 'Disponible', value: 'Disponible', description: 'Chariot Disponible', imgStatut: 'Assets/Img/check.png' },
                { label: 'Indisponible', value: 'Indisponible', description: 'Chariot Indisponible', imgStatut: 'Assets/Img/unCheck.png' }
            ],
            filter: ref(''),
            columnsTdb,
            rowsTdb,
            columnsClient,
            rowsClient,
            /* Exporter en format csv (TDB) */
            exportTableTdb() {
                /* Encodage a format csv */
                const content = [columnsTdb.map(col => wrapCsvValue(col.label))].concat(
                    rowsTdb.map(rowsTdb => columnsTdb.map(col => wrapCsvValue(
                        typeof col.field === 'function' ?
                        col.field(rowsTdb) :
                        rowsTdb[col.field === void 0 ? col.name : col.field],
                        col.format
                    )).join(','))
                ).join('\r\n')

                const status = exportFile(
                    'table-export.csv',
                    content,
                    'text/csv'
                )
            },
            /* Exporter en format csv (CLIENTS) */
            exportTableClient() {
                /* Encodage a format csv */
                const content = [columnsClient.map(col => wrapCsvValue(col.label))].concat(
                    rowsClient.map(rowsClient => columnsClient.map(col => wrapCsvValue(
                        typeof col.field === 'function' ?
                        col.field(rowsClient) :
                        rowsClient[col.field === void 0 ? col.name : col.field],
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

app.use(Quasar, { config: {} });
app.mount('#q-app')