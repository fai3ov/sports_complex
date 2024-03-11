<div id="sidebar"><a href="#" class="visible-phone"><i class="fas fa-home"></i> Панель управления</a>
  <ul>
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>"><a href="index.php"><i class="fas fa-tachometer-alt"></i> <span>Панель управления</span></a> </li>

    <li class="submenu"> <a href="#"><i class="fas fa-users"></i> <span>Клиенты</span> <span class="label label-important"><?php include 'dashboard-usercount.php';?> </span></a>
      <ul>
        <li class="<?php if($page=='members'){ echo 'active'; }?>"><a href="members.php"><i class="fas fa-arrow-right"></i> Список всех клиентов</a></li>
        <li class="<?php if($page=='members-entry'){ echo 'active'; }?>"><a href="member-entry.php"><i class="fas fa-arrow-right"></i> Добавление клиента</a></li>
        <li class="<?php if($page=='members-remove'){ echo 'active'; }?>"><a href="remove-member.php"><i class="fas fa-arrow-right"></i> Удаление клиентов</a></li>
        <li class="<?php if($page=='members-update'){ echo 'active'; }?>"><a href="edit-member.php"><i class="fas fa-arrow-right"></i> Обновление данных клиентов</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="fas fa-dumbbell"></i> <span>Спортинвентарь</span> <span class="label label-important"><?php include 'dashboard-equipcount.php';?> </span></a>
    <ul>
        <li class="<?php if($page=='list-equip'){ echo 'active'; }?>"><a href="equipment.php"><i class="fas fa-arrow-right"></i> Список спортинвентаря</a></li>
        <li class="<?php if($page=='add-equip'){ echo 'active'; }?>"><a href="equipment-entry.php"><i class="fas fa-arrow-right"></i> Добавление спортинвентаря</a></li>
        <li class="<?php if($page=='remove-equip'){ echo 'active'; }?>"><a href="remove-equipment.php"><i class="fas fa-arrow-right"></i> Удаление спортинвентаря</a></li>
        <li class="<?php if($page=='update-equip'){ echo 'active'; }?>"><a href="edit-equipment.php"><i class="fas fa-arrow-right"></i> Обновление информации о спортинвентаре</a></li>
      </ul>
    </li>

    <li class="<?php if($page=='attendance'){ echo 'submenu active'; } else { echo 'submenu';}?>"> <a href="#"><i class="fas fa-calendar-alt"></i> <span>Посещения клиентов</span></a>
      <ul>
        <li class="<?php if($page=='attendance'){ echo 'active'; }?>"><a href="attendance.php"><i class="fas fa-arrow-right"></i> Регистрации прихода/ухода</a></li>
          <li class="<?php if($page=='view-attendance'){ echo 'active'; }?>"><a href="view-attendance.php"><i class="fas fa-arrow-right"></i> Просмотр посещений</a></li>
        </ul>
    </li>

    <li class="<?php if($page=='manage-customer-progress'){ echo 'active'; }?>"><a href="customer-progress.php"><i class="fas fa-tasks"></i> <span>Прогресс клиентов</span></a></li>

    <li class="<?php if($page=='member-status'){ echo 'active'; }?>"><a href="member-status.php"><i class="fas fa-eye"></i> <span>Статус клиентов</span></a></li>

    <li class="<?php if($page=='payment'){ echo 'active'; }?>"><a href="payment.php"><i class="fas fa-hand-holding-usd"></i> <span>Платежи от клиентов</span></a></li>

    <li class="<?php if($page=='announcement'){ echo 'active'; }?>"><a href="announcement.php"><i class="fas fa-bullhorn"></i> <span>Объявления</span></a></li>

    <li class="<?php if($page=='staff-management'){ echo 'active'; }?>"><a href="staffs.php"><i class="fas fa-briefcase"></i> <span>Управление персоналом</span></a></li>

      <li class="submenu"> <a href="#"><i class="fas fa-file"></i> <span>Отчёты</span></a>
    <ul>
        <li class="<?php if($page=='chart'){ echo 'active'; }?>"><a href="reports.php"><i class="fas fa-arrow-right"></i> Диаграммы</a></li>
        <li class="<?php if($page=='member-repo'){ echo 'active'; }?>"><a href="members-report.php"><i class="fas fa-arrow-right"></i> Отчёты о клиентах</a></li>
        <li class="<?php if($page=='c-p-r'){ echo 'active'; }?>"><a href="progress-report.php"><i class="fas fa-arrow-right"></i> Отчёты о прогрессе клиентов</a></li>
      </ul>
    </li>

  </ul>
</div>