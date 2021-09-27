const { ref } = Vue
const { exportFile, useQuasar } = Quasar;

const columns = [
    { name: 'id', required: true, label: 'Id', align: 'left', field: row => row.name, format: val => `${val}`, sortable: true },
    { name: 'type', align: 'center', label: 'Type', field: 'type', sortable: true },
    { name: 'numero', label: 'Numéro', field: 'numero', sortable: true },
    { name: 'equipements', label: 'Equipements', field: 'equipements' },
    { name: 'statut', label: 'Statut', field: 'statut' },
    { name: 'kmjour', label: 'Km/J', field: 'kmjour', sortable: true, sort: (a, b) => parseInt(a, 10) - parseInt(b, 10) },
    { name: 'kmreel', label: 'Km Réel', field: 'kmreel', sortable: true, sort: (a, b) => parseInt(a, 10) - parseInt(b, 10) },
    { name: 'horametre', label: 'Horamétre', field: 'horametre', sortable: true, sort: (a, b) => parseInt(a, 10) - parseInt(b, 10) },
    { name: 'client', label: 'Client', field: 'client', sortable: true, sort: (a, b) => parseInt(a, 10) - parseInt(b, 10) },
    { name: 'action', label: 'Action', field: 'action' }

]

const rows = [{
        id: '',
        type: 'Frontal Electrique',
        numero: 'BLITZ 316 DC',
        equipements: 'TE, IMP, DOU',
        statut: 'Oui',
        kmjour: 240,
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
        kmjour: 240,
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
        kmjour: 240,
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
        kmjour: 240,
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
        kmjour: 240,
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
        kmjour: 240,
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
        kmjour: 240,
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
        kmjour: 240,
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
        kmjour: 240,
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
            client: ref(''),
            clients: [
                'BOLTON (Saupiquet)', 'DOUWE EGBERTS (JDE)', 'INTERSNACK', 'KIMBERLY CLARCK (PMCK)', 'PMC (PMCH)', 'UNILEVER'
            ],
            observations: ref(''),
            numero: ref(''),
            km: ref(''),
            kmJour: ref(''),
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
                { label: 'Disponible', imgStatut: 'Assets/Img/check.jpg' },
                { label: 'Indisponible', imgStatut: 'Assets/Img/unCheck.png' }
            ],
            filter: ref(''),
            columns,
            rows,

            exportTable() {
                // naive encoding to csv format
                const content = [columns.map(col => wrapCsvValue(col.label))].concat(
                    rows.map(row => columns.map(col => wrapCsvValue(
                        typeof col.field === 'function' ?
                        col.field(row) :
                        row[col.field === void 0 ? col.name : col.field],
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