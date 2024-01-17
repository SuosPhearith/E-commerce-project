import { User } from 'src/modules/user/entities/user.entity';
import {
  Column,
  Entity,
  JoinColumn,
  OneToOne,
  PrimaryGeneratedColumn,
} from 'typeorm';

@Entity()
export class Footer {
  @PrimaryGeneratedColumn('uuid')
  id: string;

  @Column()
  leftTtile: string;

  @Column()
  leftDescription: Text;

  @Column()
  centerTitle: string;

  @Column()
  centerDescription: Text;

  @Column()
  rigthTitle: string;

  @Column()
  rightDescription: Text;

  @Column()
  updatedAt: Date;

  @OneToOne(() => User)
  @JoinColumn()
  updatedBy: User;
}
