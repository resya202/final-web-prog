import { DataTable } from "simple-datatables";

export default function InitDatatable(el)
{
    const config = {
        ajax: el.getAttribute("src")
    }
    var dt = new DataTable(el)
}
