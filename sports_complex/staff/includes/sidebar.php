<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>"><a href="index.php"><i class="icon icon-home"></i> <span>Панель управления</span></a> </li>

    <li class="<?php if($page=='member'){ echo 'submenu active'; } else { echo 'submenu';}?>"> <a href="#"><i class="icon icon-group"></i> <span>Клиенты</span></a>
      <ul>
        <li><a href="members.php">Список всех клиентов</a></li>
        <li><a href="member-entry.php">Добавление клиента</a></li>
        <li><a href="remove-member.php">Удаление клиента</a></li>
        <li><a href="edit-member.php">Обновление данных клиентов</a></li>
      </ul>
    </li>

    <li class="<?php if($page=='equipment'){ echo 'submenu active'; } else { echo 'submenu';}?>"> <a href="#"><i class="icon icon-cogs"></i> <span>Спортинвентарь</span> </a>
      <ul>
        <li><a href="equipment.php">Список спортинвентаря</a></li>
        <li><a href="equipment-entry.php">Добавление спортинвентаря</a></li>
        <li><a href="remove-equipment.php">Удаление спортинвентаря</a></li>
        <li><a href="edit-equipment.php">Обновление информации о спортинвентаре</a></li>
      </ul>
    </li>

    <li class="<?php if($page=='membersts'){ echo 'active'; }?>"><a href="member-status.php"><i class="icon icon-eye-open"></i> <span>Статус клиентов</span></a></li>
    <li class="<?php if($page=='payment'){ echo 'active'; }?>"><a href="payment.php"><i class="icon icon-money"></i> <span>Платежи от клиентов</span></a></li>
    <li class="<?php if($page=='attendance'){ echo 'active'; }?>"><a href="attendance.php"><i class="icon icon-calendar"></i> <span>Регистрации прихода/ухода</span></a></li>

  </ul>
</div>
<!--sidebar-menu-->