import DataTable from "datatables.net-dt";

export default function InitDatatable(el)
{
    const config = {
        searchable: false,
    }

    const table = new DataTable(el, config)
}

