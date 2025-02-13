import Gantt from 'frappe-gantt';

export default function InitGantt(el, {tasks})
{
    let gantt = new Gantt(el, tasks, {
        container_height: "200",
        readonly: true,
        view_mode_select: true,
    });
}
