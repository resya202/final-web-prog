import Gantt from 'frappe-gantt';

export default function InitGantt(el, { tasks }) {
    var gantt = new Gantt(el, tasks, {
        popup_on: "hover",
        readonly: true,
        view_mode_select: true,
        on_click: function (task) {
            location.href = task.detail_url
        },
        on_date_change: function (task, start, end) {
            console.log(task, start, end);
        },
        on_progress_change: function (task, progress) {
            console.log(task, progress);
        },
        on_view_change: function (mode) {
            console.log(mode);
        },
        custom_popup_html: function (task) {
          // custom popup when th user clicks on any task.
          // the task object will contain the updated dates and progress value
          const start_date = task._start.toLocaleDateString();
          const end_date = task._end.toLocaleDateString();
          return `
                <div class="details-container">
                  <h5>${task.name}</h5>
                  <p>Started on ${start_date}</p>
                  <p>Expected to finish by ${end_date}</p>
                  <p>${task.progress}% completed!</p>
                  <p>Depended on ${task.dependencies}.</p>
                  <p>Assigned to ${task.assignee}.</p>
                </div>
              `;
        },
    });
}
