import DataTable from "datatables.net-dt";

export default function InitDatatable(el)
{
    const config = {
        searchable: false,
        // ajax: el.getAttribute("src")
    }

    const table = new DataTable(el, config)
}

