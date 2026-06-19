import {
    Combobox,
    ComboboxContent,
    ComboboxEmpty,
    ComboboxInput,
    ComboboxItem,
    ComboboxList,
} from '@/components/ui/combobox';
import { Field, FieldGroup, FieldLabel, FieldSet } from '@/components/ui/field';
import leave from '@/routes/leave';
import { User } from '@/types';
import { useForm, usePage } from '@inertiajs/react';
import { useEffect } from 'react';

type PageProps = {
    users: User[];
};

type FileLeaveForm = {
    user_id: number;
    leave_type: string;
    event_type: string;
    event_tag?: string;
    starts_at: string;
    ends_at: string;
};

export default function LeaveForm() {
    const { users } = usePage<PageProps>().props;

    const form = useForm<FileLeaveForm>({
        user_id: 0,
        leave_type: '',
        event_type: '',
        event_tag: undefined,
        starts_at: '',
        ends_at: '',
    });

    return (
        <FieldSet className="w-full max-w-2xl rounded-md border md:p-8">
            {/* user */}
            <FieldGroup>
                <Field>
                    <FieldLabel htmlFor="employee_name">
                        Employee Name
                    </FieldLabel>
                    <Combobox
                        onValueChange={(value) => {
                            form.setData('user_id', Number(value));
                        }}
                        items={users}
                    >
                        <ComboboxInput
                            value={
                                users.find(
                                    (user) => user.id === form.data.user_id,
                                )?.name
                            }
                            placeholder="Select an employee"
                        />
                        <ComboboxContent>
                            <ComboboxEmpty>No items found.</ComboboxEmpty>
                            <ComboboxList>
                                {(user) => (
                                    <ComboboxItem key={user.id} value={user.id}>
                                        {user.name}
                                    </ComboboxItem>
                                )}
                            </ComboboxList>
                        </ComboboxContent>
                    </Combobox>
                </Field>
            </FieldGroup>

            <FieldGroup>
                <FieldLabel>Leave Date</FieldLabel>
                {/* start date */}

                {/* end date */}
            </FieldGroup>
        </FieldSet>
    );
}

LeaveForm.layout = {
    breadcrumbs: [
        {
            title: 'File Leave Form',
            href: leave.index(),
        },
    ],
};
